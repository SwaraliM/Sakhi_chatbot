
<!-- todo  -->
<!-- create for admin and user -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="../assets/favicon.ico">

    <link rel="stylesheet" href="../style/home.css">

    <title>Complaint Status - CMS</title>
</head>


<body>

<div class="container">
	<div class="blob-container">
    <div class="blob"></div>
    <div class="blob one"></div>
    <div class="blob two"></div>
    <div class="blob three"></div>
    <div class="blob four"></div>
    <div class="blob five"></div>
    <div class="blob six"></div>
    <div class="blob seven"></div>
    <div class="blob eight"></div>
    <div class="blob nine"></div>
    <div class="blob ten"></div>
  </div>

  <section>
      <div class="card">
        <div class="card-child">
          <h1 class="user-title">Welcome Bhanupratap ! <span class="xdgfds">
            <button>Logout</button>
          </span></h1>
          <!-- button -->
          
          <img class="image-container" src="../assets/user_avatar.svg" alt="user avatar" />
        </div>

          <div class="complaint-section">
            <div class="card">
              <h1>Your Complaints</h1>
              <table>
  <thead>
    <tr>
      <th>S.no</th>
      <th>Complaint Title</th>
      <th>Description</th>
      <th>Author</th>
      <th>Status</th>

    </tr>
  </thead>
  <tbody>
    <?php
      for ($x = 0; $x <= 10; $x++) {
      echo"  <tr>
        <td data-column=> $x </td>
        <td>Matman</td>
        <td>Chief Sandwich Eater</td>
        <td>@james</td>
        <td>@james</td>

      </tr>

      ";
      }
    ?>


  </tbody>
</table>    
          </div>
        </div>

    </div>

  </section>
</div>

</body>
</html>




