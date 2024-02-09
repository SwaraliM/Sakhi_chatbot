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

