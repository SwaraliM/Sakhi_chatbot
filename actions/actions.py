# This files contains your custom actions which can be used to run
# custom Python code.
#
# See this guide on how to implement these action:
# https://rasa.com/docs/rasa/custom-actions


# This is a simple example for a custom action which utters "Hello World!"

# from typing import Any, Text, Dict, List
#
# from rasa_sdk import Action, Tracker
# from rasa_sdk.executor import CollectingDispatcher
#
#
# class ActionHelloWorld(Action):
#
#     def name(self) -> Text:
#         return "action_hello_world"
#
#     def run(self, dispatcher: CollectingDispatcher,
#             tracker: Tracker,
#             domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
#
#         dispatcher.utter_message(text="Hello World!")
#
#         return []

from typing import Dict, Any, Text, List
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
from rasa_sdk.events import SlotSet
from actions.utils.model_methods import final_function_1

from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
import smtplib
from fpdf import FPDF

class ActionDisplayDetails(Action):
    def name(self) -> Text:
        return "action_display_details"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        date = tracker.get_slot("date")
        time = tracker.get_slot("time")
        location = tracker.get_slot("location")
        perpetrator_name = tracker.get_slot("perpetrator_name")
        perpetrator_relation = tracker.get_slot("perpetrator_relation")

        details_message = f"Here are the details you provided:\nDate: {date}\nTime: {time}\nLocation: {location}\nPerpetrator Name: {perpetrator_name}\nPerpetrator Relation: {perpetrator_relation}"

        dispatcher.utter_message(details_message)
        dispatcher.utter_message("Does this look correct to you?")
        # dispatcher.utter_message("Please confirm if these details are correct, or if you'd like to update anything.")
        return []
    
class ActionPredictHarassmentClass(Action):
    def name(self) -> Text:
        return "action_predict_harassment_class"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        # Ask the user to describe their experience
        # dispatcher.utter_message("Please describe your experience in detail. Do not leave out any details.")

        # Retrieve user's response
        user_input = tracker.get_slot("detailed_description")

        # Preprocess user's input if necessary

        # Call the function from model_methods.py to predict the class of harassment
        predicted_labels, predicted_probabilities = final_function_1([user_input])

        # Get the predicted class
        predicted_class = predicted_labels[0]

        # Provide the predicted class and probabilities to the user
        dispatcher.utter_message(f"The predicted class of harassment is: {predicted_labels[0]}")
        # dispatcher.utter_message(f"Probabilities: {predicted_probabilities[0]}")
        dispatcher.utter_message()

        return [SlotSet("harassment_classification", predicted_class)]
    
class ActionCreateAndSendReport(Action):
    def name(self) -> Text:
        return "action_create_and_send_report"

    def generate_pdf(self, report_content: str) -> str:
        # Create PDF object
        pdf = FPDF()
        pdf.add_page()
        pdf.set_font("Arial", size=12)

        # Write report content to PDF
        pdf.multi_cell(0, 10, report_content)

        # Save PDF file
        pdf_file_path = "reports/report.pdf"
        pdf.output(pdf_file_path)

        return pdf_file_path

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        # Retrieve filled slots
        date = tracker.get_slot("date")
        time = tracker.get_slot("time")
        location = tracker.get_slot("location")
        perpetrator_name = tracker.get_slot("perpetrator_name")
        perpetrator_relation = tracker.get_slot("perpetrator_relation")
        harassment_classification = tracker.get_slot("harassment_classification")
        email = tracker.get_slot("email")  # Retrieve user's email

        # Generate report content
        report_content = f"""[Your Company's Letterhead]

[Date]

[Recipient's Name]
[Recipient's Position/Title]
[Recipient's Department/Organization]
[Company/Organization Name]
[Company/Organization Address]
[City, State, Zip Code]

Dear [Recipient's Name or Title],

Subject: Workplace Harassment Incident Report

I am writing to report a workplace harassment incident that occurred on {date} at {location}. The incident involved {perpetrator_name} who is {perpetrator_relation} to the victim. The details of the incident are as follows:

Date: {date}
Time: {time}
Location: {location}
Perpetrator Name: {perpetrator_name}
Perpetrator Relation: {perpetrator_relation}

Additionally, based on the information provided, our chatbot system has classified the incident as {harassment_classification}. The recommended course of action suggested by the chatbot is as follows:

This incident has been documented in accordance with the provisions of the Prevention of Sexual Harassment (POSH) Act of India. As per the POSH Act, it is our legal obligation to provide a safe and harassment-free workplace environment for all employees. We take such matters seriously and are committed to ensuring compliance with the POSH Act.

Please note that as per the POSH Act, an Internal Complaints Committee (ICC) has been constituted within our organization to address complaints related to sexual harassment. Employees are encouraged to report any instances of harassment to the ICC for appropriate investigation and action.

Please do not hesitate to contact me if you require any further information or assistance regarding this matter.

Thank you for your attention to this report.

Sincerely,

[Your Name]
[Your Position/Title]
[Your Contact Information]
"""

        # Generate PDF
        pdf_file_path = self.generate_pdf(report_content)

        # Set up email parameters
        sender_email = "sakhi.workplace2024@gmail.com"
        password = "lqujxqqanfkcjcwm"

        # Create message object
        message = MIMEMultipart()
        message["From"] = sender_email
        message["To"] = email
        message["Subject"] = "Workplace Harassment Report"

        # Add report content to email body
        message.attach(MIMEText(report_content, "plain"))

        # Attach PDF file
        with open(pdf_file_path, "rb") as attachment:
            part = MIMEBase("application", "octet-stream")
            part.set_payload(attachment.read())
        encoders.encode_base64(part)
        part.add_header("Content-Disposition", f"attachment; filename=report.pdf")
        message.attach(part)

        # Connect to SMTP server and send email
        with smtplib.SMTP_SSL("smtp.gmail.com", 465) as server:
            server.login(sender_email, password)
            server.sendmail(sender_email, email, message.as_string())

        # Send confirmation message to the user
        dispatcher.utter_message("Report has been created and sent to your email.")

        return []
