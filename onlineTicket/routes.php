<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Step 1: Select Source and Destination</title>

  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

 

  <!-- jQuery and Select2 JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      animation: gradientAnimation 10s ease infinite;
    }

    @keyframes gradientAnimation {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      max-width: 500px;
      width: 100%;
      padding: 30px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      font-size: 28px;
      color: #2575fc;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 1.5px;
    }

    h1 span {
      color: #6a11cb;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    /* Add margin-bottom to create space */
    .form-group.date-group {
      margin-bottom: 25px; /* Adjust this value as needed */
    }

    label {
      font-weight: 600;
      color: #555;
      text-align: left;
    }

    select, input {
      width: 100%;
      padding: 12px;
      border: 2px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      background: #f9f9f9;
      transition: all 0.3s ease-in-out;
    }

    select:focus, input:focus {
      border-color: #2575fc;
      outline: none;
      box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
    }

    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    button:hover {
      background: linear-gradient(135deg, #2575fc, #6a11cb);
      transform: scale(1.05);
    }

    /* Flatpickr Custom Styles */
    .flatpickr-input {
      background: #f9f9f9;
      border: 2px solid #ddd;
      border-radius: 8px;
      padding: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .flatpickr-input:focus {
      border-color: #2575fc;
      box-shadow: 0 0 8px rgba(37, 117, 252, 0.5);
    }
  </style>
<body>
  <div class="container">
    <h1>Book Your <span>Bus</span></h1>
    <!-- In routes.html, change the form action -->
<!-- Form action को बदलें -->
<form id="busForm" action="../onlineTicket\available_buses.php" method="GET">
  <!-- बाकी कोड वही रहेगा -->

  <!-- Rest of your form remains the same -->

      <div class="form-group">
        <div>
          <label for="source">Source:</label>
          <select name="source" id="source" required>
            <!-- Your source options -->
            <option value="Sakoli">Sakoli</option>
            <option value="Deori">Deori</option>
            <option value="Navegaon">Navegaon</option>
            <option value="Aamgoan">Aamgoan</option>
            <option value="Kakodi">Kakodi</option>
            <option value="Rajnandgaon">Rajnandgaon</option>
            <option value="Lalbarra">Lalbarra</option>
            <option value="Nagpur">Nagpur</option>
            <option value="Katol">Katol</option>
            <option value="Yawatmal">Yawatmal</option>
            <option value="Chindwada">Chindwada</option>
            <option value="Amravati">Amravati</option>
            <option value="Nanded">Nanded</option>
            <option value="Pusad">Pusad</option>
            <option value="Mahur">Mahur</option>
            <option value="Umarkhed">Umarkhed</option>
            <option value="Shegaon">Shegaon</option>
            <option value="Pratapgad">Pratapgad</option>
            <option value="Chichgad">Chichgad</option>
            <option value="Lonar">Lonar</option>
            <option value="Paratwada">Paratwada</option>
            <option value="Wardha">Wardha</option>
            <option value="Aheri">Aheri</option>
            <option value="Chandrapur">Chandrapur</option>
            <option value="Balaghat">Balaghat</option>
            <option value="Bhandara">Bhandara</option>
            <option value="Magardoh">Magardoh</option>
            <option value="Kurkheda">Kurkheda</option>
            <option value="Mehtakheda">Mehtakheda</option>
            <option value="Raypur">Raypur</option>
            <option value="Palandur">Palandur</option>
            <option value="Wadsa">Wadsa</option>
            <option value="Rajura">Rajura</option>
            <option value="Lakhandur">Lakhandur</option>
            <option value="Mohrana">Mohrana</option>
            <option value="Keshori">Keshori</option>
            <option value="Ballarsha">Ballarsha</option>
            <option value="Khamba">Khoba</option>
            <option value="Bolde">Bolde</option>
            <option value="Gondumari">Gondumari</option>
            <option value="Mahalgoan">Mahalgoan</option>
            <option value="Parsodi">Parsodi</option>
            <option value="Jambhli">Jambhli</option>
            <option value="Khamba">Khamba</option>
            <option value="Salebhata">Salebhata</option>
            <option value="Shenda">Shenda</option>
            <option value="Dinkarnagar">Dinkarnagar</option>
            <option value="Arjuni">Arjuni</option>
            <option value="Bharnoli">Bharnoli</option>
            <option value="Lendezari">Lendezari</option>
            <option value="Khodshiwni">Khodshiwni</option>
            <option value="Kosamtondi">Kosamtondi</option>
            <option value="Satalwada">Satalwada</option>
            <option value="Mokhe">Mokhe</option>
            <option value="Dhanori">Dhanori</option>
            <option value="Tumsar">Tumsar</option>
            <option value="Sonegaon">Sonegaon</option>
            <option value="Tiroda">Tiroda</option>
            <option value="Umarzari">Umarzari</option>
            <option value="Parastola">Parastola</option>
            <option value="Ghanod">Ghanod</option>
            <option value="Pitezari">Pitezari</option>
            <option value="Adyal">Adyal</option>
            <option value="Mauda">Mauda</option>
            <option value="Lakhni">Lakhni</option>


          </select>
        </div>
    
        <div>
          <label for="destination">Destination:</label>
          <select name="destination" id="destination" required>
            <!-- Your destination options -->
            <option value="Sakoli">Sakoli</option>
            <option value="Deori">Deori</option>
            <option value="Navegaon">Navegaon</option>
            <option value="Aamgoan">Aamgoan</option>
            <option value="Kakodi">Kakodi</option>
            <option value="Rajnandgaon">Rajnandgaon</option>
            <option value="Lalbarra">Lalbarra</option>
            <option value="Nagpur">Nagpur</option>
            <option value="Katol">Katol</option>
            <option value="Yawatmal">Yawatmal</option>
            <option value="Chindwada">Chindwada</option>
            <option value="Amravati">Amravati</option>
            <option value="Nanded">Nanded</option>
            <option value="Pusad">Pusad</option>
            <option value="Mahur">Mahur</option>
            <option value="Umarkhed">Umarkhed</option>
            <option value="Shegaon">Shegaon</option>
            <option value="Pratapgad">Pratapgad</option>
            <option value="Chichgad">Chichgad</option>
            <option value="Lonar">Lonar</option>
            <option value="Paratwada">Paratwada</option>
            <option value="Wardha">Wardha</option>
            <option value="Aheri">Aheri</option>
            <option value="Chandrapur">Chandrapur</option>
            <option value="Balaghat">Balaghat</option>
            <option value="Bhandara">Bhandara</option>
            <option value="Magardoh">Magardoh</option>
            <option value="Kurkheda">Kurkheda</option>
            <option value="Mehtakheda">Mehtakheda</option>
            <option value="Raypur">Raypur</option>
            <option value="Palandur">Palandur</option>
            <option value="Wadsa">Wadsa</option>
            <option value="Rajura">Rajura</option>
            <option value="Lakhandur">Lakhandur</option>
            <option value="Mohrana">Mohrana</option>
            <option value="Keshori">Keshori</option>
            <option value="Ballarsha">Ballarsha</option>
            <option value="Khamba">Khoba</option>
            <option value="Bolde">Bolde</option>
            <option value="Gondumari">Gondumari</option>
            <option value="Mahalgoan">Mahalgoan</option>
            <option value="Parsodi">Parsodi</option>
            <option value="Jambhli">Jambhli</option>
            <option value="Khamba">Khamba</option>
            <option value="Salebhata">Salebhata</option>
            <option value="Shenda">Shenda</option>
            <option value="Dinkarnagar">Dinkarnagar</option>
            <option value="Arjuni">Arjuni</option>
            <option value="Bharnoli">Bharnoli</option>
            <option value="Lendezari">Lendezari</option>
            <option value="Khodshiwni">Khodshiwni</option>
            <option value="Kosamtondi">Kosamtondi</option>
            <option value="Satalwada">Satalwada</option>
            <option value="Mokhe">Mokhe</option>
            <option value="Dhanori">Dhanori</option>
            <option value="Tumsar">Tumsar</option>
            <option value="Sonegaon">Sonegaon</option>
            <option value="Tiroda">Tiroda</option>
            <option value="Umarzari">Umarzari</option>
            <option value="Parastola">Parastola</option>
            <option value="Ghanod">Ghanod</option>
            <option value="Pitezari">Pitezari</option>
            <option value="Adyal">Adyal</option>
            <option value="Mauda">Mauda</option>
            <option value="Lakhni">Lakhni</option>


          </select>
        </div>
      </div>
    
      <div class="form-group date-group">
        <div>
          <label for="departure">Date of Departure:</label>
          <input type="text" name="departure" id="departure" class="flatpickr-input" placeholder="Select Date" required>
        </div>
      </div>
    
      <button type="submit">Search Buses</button>
    </form>
  </div>

  <script>
    function viewSeats(busId, busName, malePrice, femalePrice) {
    const departureDate = document.getElementById('departure').value; // यात्रा की तारीख
    window.location.href = `seat_selection.html?busId=${busId}&busName=${encodeURIComponent(busName)}&malePrice=${malePrice}&femalePrice=${femalePrice}&departureDate=${departureDate}`;
}
    $(document).ready(function() {
      // Initialize Select2
      $('#source').select2({
        placeholder: "🔍 Search Source",
        allowClear: true,
        width: '100%'
      });

      $('#destination').select2({
        placeholder: "🔍 Search Destination",
        allowClear: true,
        width: '100%'
      });

      // Initialize Flatpickr
      flatpickr("#departure", {
        minDate: "today",
        dateFormat: "d-m-Y",
        altInput: true,
        altFormat: "F j, Y",
        defaultDate: "today",
        animate: true,
      });

      // Form validation
      $('#busForm').on('submit', function(event) {
        const source = $('#source').val();
        const destination = $('#destination').val();

        if (source === destination) {
          alert("Source and Destination cannot be the same!");
          event.preventDefault(); // Prevent form submission
        }
      });
    });
  </script>
</body>
</html>