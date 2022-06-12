<?php
	session_start();
	if (!isset($_SESSION['login'])) {
		header('location:../auth/login.php?message=view');
	} /*else if (isset($_SESSION['login']) && isset($_SESSION['role']) == "admin") {
		header('location:../index/admin.php');
	}*/
?>

<head>
    <!-- recuired meta tag -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- icon tab -->
    <link rel="shortcut icon" type="image/png" href="../img/sp.png" />

    <!-- js -->
    <!-- <script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script> -->
    <!-- <script src="../js/script.js"></script> -->

    <title>Aplikasi Pembayaran SPP</title>
  </head>
  <body style="background-color: #fafafa; font-family: 'Poppins">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white mt-3 mb-3 me-4 ms-4 shadow p-2 fixed-top" style="border-radius: 13px">
      <div class="container-fluid">
        <!-- brand -->
        <a class="navbar-brand" href="#" style="color: #2196f3">
          <svg width="252" height="61" viewBox="0 0 252 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M14.7775 48.8C13.2442 48.8 11.7775 48.5833 10.3775 48.15C8.97754 47.7167 7.69421 47.0667 6.52754 46.2C5.36087 45.3333 4.34421 44.2833 3.47754 43.05C2.61087 41.7833 1.92754 40.3167 1.42754 38.65L7.77754 36.15C8.24421 37.95 9.06087 39.45 10.2275 40.65C11.3942 41.8167 12.9275 42.4 14.8275 42.4C15.5275 42.4 16.1942 42.3167 16.8275 42.15C17.4942 41.95 18.0775 41.6833 18.5775 41.35C19.1109 40.9833 19.5275 40.5333 19.8275 40C20.1275 39.4667 20.2775 38.85 20.2775 38.15C20.2775 37.4833 20.1609 36.8833 19.9275 36.35C19.6942 35.8167 19.2942 35.3167 18.7275 34.85C18.1942 34.3833 17.4775 33.9333 16.5775 33.5C15.7109 33.0667 14.6275 32.6167 13.3275 32.15L11.1275 31.35C10.1609 31.0167 9.17754 30.5667 8.17754 30C7.21087 29.4333 6.32754 28.75 5.52754 27.95C4.72754 27.15 4.06087 26.2167 3.52754 25.15C3.02754 24.05 2.77754 22.8167 2.77754 21.45C2.77754 20.05 3.04421 18.75 3.57754 17.55C4.14421 16.3167 4.92754 15.25 5.92754 14.35C6.96087 13.4167 8.17754 12.7 9.57754 12.2C11.0109 11.6667 12.5942 11.4 14.3275 11.4C16.1275 11.4 17.6775 11.65 18.9775 12.15C20.3109 12.6167 21.4275 13.2333 22.3275 14C23.2609 14.7333 24.0109 15.55 24.5775 16.45C25.1442 17.35 25.5609 18.2 25.8275 19L19.8775 21.5C19.5442 20.5 18.9275 19.6 18.0275 18.8C17.1609 18 15.9609 17.6 14.4275 17.6C12.9609 17.6 11.7442 17.95 10.7775 18.65C9.81087 19.3167 9.32754 20.2 9.32754 21.3C9.32754 22.3667 9.79421 23.2833 10.7275 24.05C11.6609 24.7833 13.1442 25.5 15.1775 26.2L17.4275 26.95C18.8609 27.45 20.1609 28.0333 21.3275 28.7C22.5275 29.3333 23.5442 30.1 24.3775 31C25.2442 31.9 25.8942 32.9333 26.3275 34.1C26.7942 35.2333 27.0275 36.55 27.0275 38.05C27.0275 39.9167 26.6442 41.5333 25.8775 42.9C25.1442 44.2333 24.1942 45.3333 23.0275 46.2C21.8609 47.0667 20.5442 47.7167 19.0775 48.15C17.6109 48.5833 16.1775 48.8 14.7775 48.8ZM31.5873 23.5H37.7373V26.45H38.1373C38.7373 25.4167 39.6706 24.5333 40.9373 23.8C42.204 23.0667 43.7706 22.7 45.6373 22.7C47.204 22.7 48.6873 23.0333 50.0873 23.7C51.5206 24.3333 52.7706 25.2333 53.8373 26.4C54.9373 27.5333 55.804 28.9 56.4373 30.5C57.0706 32.1 57.3873 33.85 57.3873 35.75C57.3873 37.65 57.0706 39.4 56.4373 41C55.804 42.6 54.9373 43.9833 53.8373 45.15C52.7706 46.2833 51.5206 47.1833 50.0873 47.85C48.6873 48.4833 47.204 48.8 45.6373 48.8C43.7706 48.8 42.204 48.4333 40.9373 47.7C39.6706 46.9667 38.7373 46.0833 38.1373 45.05H37.7373L38.1373 48.55V58.8H31.5873V23.5ZM44.2873 42.75C45.154 42.75 45.9706 42.5833 46.7373 42.25C47.5373 41.9167 48.2373 41.45 48.8373 40.85C49.4373 40.25 49.9206 39.5167 50.2873 38.65C50.654 37.7833 50.8373 36.8167 50.8373 35.75C50.8373 34.6833 50.654 33.7167 50.2873 32.85C49.9206 31.9833 49.4373 31.25 48.8373 30.65C48.2373 30.05 47.5373 29.5833 46.7373 29.25C45.9706 28.9167 45.154 28.75 44.2873 28.75C43.4206 28.75 42.5873 28.9167 41.7873 29.25C41.0206 29.55 40.3373 30 39.7373 30.6C39.1373 31.2 38.654 31.9333 38.2873 32.8C37.9206 33.6667 37.7373 34.65 37.7373 35.75C37.7373 36.85 37.9206 37.8333 38.2873 38.7C38.654 39.5667 39.1373 40.3 39.7373 40.9C40.3373 41.5 41.0206 41.9667 41.7873 42.3C42.5873 42.6 43.4206 42.75 44.2873 42.75Z"
              fill="#2196F3"
            />
            <path
              d="M88.6231 37.27C88.6231 39.15 87.9331 40.66 86.5531 41.8C85.1531 42.92 83.4531 43.48 81.4531 43.48C79.6731 43.48 78.1031 42.96 76.7431 41.92C75.3831 40.88 74.4431 39.46 73.9231 37.66L76.5631 36.58C76.7431 37.22 76.9931 37.8 77.3131 38.32C77.6331 38.84 78.0031 39.29 78.4231 39.67C78.8631 40.03 79.3431 40.32 79.8631 40.54C80.3831 40.74 80.9331 40.84 81.5131 40.84C82.7731 40.84 83.8031 40.52 84.6031 39.88C85.4031 39.22 85.8031 38.35 85.8031 37.27C85.8031 36.37 85.4731 35.6 84.8131 34.96C84.1931 34.34 83.0331 33.74 81.3331 33.16C79.6131 32.54 78.5431 32.12 78.1231 31.9C75.8431 30.74 74.7031 29.03 74.7031 26.77C74.7031 25.19 75.3331 23.84 76.5931 22.72C77.8731 21.6 79.4431 21.04 81.3031 21.04C82.9431 21.04 84.3631 21.46 85.5631 22.3C86.7631 23.12 87.5631 24.15 87.9631 25.39L85.3831 26.47C85.1431 25.67 84.6631 25.01 83.9431 24.49C83.2431 23.95 82.3831 23.68 81.3631 23.68C80.2831 23.68 79.3731 23.98 78.6331 24.58C77.8931 25.14 77.5231 25.87 77.5231 26.77C77.5231 27.51 77.8131 28.15 78.3931 28.69C79.0331 29.23 80.4231 29.87 82.5631 30.61C84.7431 31.35 86.2931 32.26 87.2131 33.34C88.1531 34.4 88.6231 35.71 88.6231 37.27ZM98.6652 40.96C99.9852 40.96 101.095 40.46 101.995 39.46C102.895 38.48 103.345 37.21 103.345 35.65C103.345 34.11 102.895 32.84 101.995 31.84C101.095 30.84 99.9852 30.34 98.6652 30.34C97.3252 30.34 96.2052 30.84 95.3052 31.84C94.4252 32.84 93.9852 34.11 93.9852 35.65C93.9852 37.21 94.4252 38.49 95.3052 39.49C96.2052 40.47 97.3252 40.96 98.6652 40.96ZM99.1152 43.48C98.0352 43.48 97.0452 43.25 96.1452 42.79C95.2652 42.33 94.5852 41.72 94.1052 40.96H93.9852L94.1052 43V49.48H91.3452V28.3H93.9852V30.34H94.1052C94.5852 29.58 95.2652 28.97 96.1452 28.51C97.0452 28.05 98.0352 27.82 99.1152 27.82C101.055 27.82 102.695 28.58 104.035 30.1C105.415 31.64 106.105 33.49 106.105 35.65C106.105 37.83 105.415 39.68 104.035 41.2C102.695 42.72 101.055 43.48 99.1152 43.48ZM115.54 40.96C116.86 40.96 117.97 40.46 118.87 39.46C119.77 38.48 120.22 37.21 120.22 35.65C120.22 34.11 119.77 32.84 118.87 31.84C117.97 30.84 116.86 30.34 115.54 30.34C114.2 30.34 113.08 30.84 112.18 31.84C111.3 32.84 110.86 34.11 110.86 35.65C110.86 37.21 111.3 38.49 112.18 39.49C113.08 40.47 114.2 40.96 115.54 40.96ZM115.99 43.48C114.91 43.48 113.92 43.25 113.02 42.79C112.14 42.33 111.46 41.72 110.98 40.96H110.86L110.98 43V49.48H108.22V28.3H110.86V30.34H110.98C111.46 29.58 112.14 28.97 113.02 28.51C113.92 28.05 114.91 27.82 115.99 27.82C117.93 27.82 119.57 28.58 120.91 30.1C122.29 31.64 122.98 33.49 122.98 35.65C122.98 37.83 122.29 39.68 120.91 41.2C119.57 42.72 117.93 43.48 115.99 43.48ZM128.748 34.3V43H125.988V21.52H133.308C135.168 21.52 136.748 22.14 138.048 23.38C139.368 24.62 140.028 26.13 140.028 27.91C140.028 29.73 139.368 31.25 138.048 32.47C136.768 33.69 135.188 34.3 133.308 34.3H128.748ZM128.748 24.16V31.66H133.368C134.468 31.66 135.378 31.29 136.098 30.55C136.838 29.81 137.208 28.93 137.208 27.91C137.208 26.91 136.838 26.04 136.098 25.3C135.378 24.54 134.468 24.16 133.368 24.16H128.748ZM143.866 38.5C143.866 39.22 144.166 39.82 144.766 40.3C145.386 40.78 146.106 41.02 146.926 41.02C148.086 41.02 149.116 40.59 150.016 39.73C150.936 38.87 151.396 37.86 151.396 36.7C150.536 36.02 149.336 35.68 147.796 35.68C146.676 35.68 145.736 35.95 144.976 36.49C144.236 37.03 143.866 37.7 143.866 38.5ZM147.436 27.82C149.476 27.82 151.086 28.37 152.266 29.47C153.446 30.55 154.036 32.04 154.036 33.94V43H151.396V40.96H151.276C150.136 42.64 148.616 43.48 146.716 43.48C145.096 43.48 143.736 43 142.636 42.04C141.556 41.08 141.016 39.88 141.016 38.44C141.016 36.92 141.586 35.71 142.726 34.81C143.886 33.91 145.426 33.46 147.346 33.46C148.986 33.46 150.336 33.76 151.396 34.36V33.73C151.396 32.77 151.016 31.96 150.256 31.3C149.496 30.62 148.606 30.28 147.586 30.28C146.046 30.28 144.826 30.93 143.926 32.23L141.496 30.7C142.836 28.78 144.816 27.82 147.436 27.82ZM169.996 28.3L160.786 49.48H157.936L161.356 42.07L155.296 28.3H158.296L162.676 38.86H162.736L166.996 28.3H169.996ZM174.557 43H171.797V28.3H174.437V30.34H174.557C174.977 29.62 175.617 29.02 176.477 28.54C177.357 28.06 178.227 27.82 179.087 27.82C180.167 27.82 181.117 28.07 181.937 28.57C182.757 29.07 183.357 29.76 183.737 30.64C184.957 28.76 186.647 27.82 188.807 27.82C190.507 27.82 191.817 28.34 192.737 29.38C193.657 30.42 194.117 31.9 194.117 33.82V43H191.357V34.24C191.357 32.86 191.107 31.87 190.607 31.27C190.107 30.65 189.267 30.34 188.087 30.34C187.027 30.34 186.137 30.79 185.417 31.69C184.697 32.59 184.337 33.65 184.337 34.87V43H181.577V34.24C181.577 32.86 181.327 31.87 180.827 31.27C180.327 30.65 179.487 30.34 178.307 30.34C177.247 30.34 176.357 30.79 175.637 31.69C174.917 32.59 174.557 33.65 174.557 34.87V43ZM203.944 43.48C201.784 43.48 200.004 42.74 198.604 41.26C197.204 39.78 196.504 37.91 196.504 35.65C196.504 33.41 197.184 31.55 198.544 30.07C199.904 28.57 201.644 27.82 203.764 27.82C205.944 27.82 207.674 28.53 208.954 29.95C210.254 31.35 210.904 33.32 210.904 35.86L210.874 36.16H199.324C199.364 37.6 199.844 38.76 200.764 39.64C201.684 40.52 202.784 40.96 204.064 40.96C205.824 40.96 207.204 40.08 208.204 38.32L210.664 39.52C210.004 40.76 209.084 41.73 207.904 42.43C206.744 43.13 205.424 43.48 203.944 43.48ZM199.534 33.88H207.964C207.884 32.86 207.464 32.02 206.704 31.36C205.964 30.68 204.964 30.34 203.704 30.34C202.664 30.34 201.764 30.66 201.004 31.3C200.264 31.94 199.774 32.8 199.534 33.88ZM213.428 28.3H216.068V30.34H216.188C216.608 29.62 217.248 29.02 218.108 28.54C218.988 28.06 219.898 27.82 220.838 27.82C222.638 27.82 224.018 28.34 224.978 29.38C225.958 30.4 226.448 31.86 226.448 33.76V43H223.688V33.94C223.628 31.54 222.418 30.34 220.058 30.34C218.958 30.34 218.038 30.79 217.298 31.69C216.558 32.57 216.188 33.63 216.188 34.87V43H213.428V28.3ZM234.746 43.24C233.546 43.24 232.546 42.87 231.746 42.13C230.966 41.39 230.566 40.36 230.546 39.04V30.82H227.966V28.3H230.546V23.8H233.306V28.3H236.906V30.82H233.306V38.14C233.306 39.12 233.496 39.79 233.876 40.15C234.256 40.49 234.686 40.66 235.166 40.66C235.386 40.66 235.596 40.64 235.796 40.6C236.016 40.54 236.216 40.47 236.396 40.39L237.266 42.85C236.546 43.11 235.706 43.24 234.746 43.24ZM251.075 38.92C251.075 40.2 250.515 41.28 249.395 42.16C248.275 43.04 246.865 43.48 245.165 43.48C243.685 43.48 242.385 43.1 241.265 42.34C240.145 41.56 239.345 40.54 238.865 39.28L241.325 38.23C241.685 39.11 242.205 39.8 242.885 40.3C243.585 40.78 244.345 41.02 245.165 41.02C246.045 41.02 246.775 40.83 247.355 40.45C247.955 40.07 248.255 39.62 248.255 39.1C248.255 38.16 247.535 37.47 246.095 37.03L243.575 36.4C240.715 35.68 239.285 34.3 239.285 32.26C239.285 30.92 239.825 29.85 240.905 29.05C242.005 28.23 243.405 27.82 245.105 27.82C246.405 27.82 247.575 28.13 248.615 28.75C249.675 29.37 250.415 30.2 250.835 31.24L248.375 32.26C248.095 31.64 247.635 31.16 246.995 30.82C246.375 30.46 245.675 30.28 244.895 30.28C244.175 30.28 243.525 30.46 242.945 30.82C242.385 31.18 242.105 31.62 242.105 32.14C242.105 32.98 242.895 33.58 244.475 33.94L246.695 34.51C249.615 35.23 251.075 36.7 251.075 38.92Z"
              fill="#2196F3"
            />
          </svg>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index/admin.php?message=view">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../auth/logout.php">Logout</a>
            </li>
          </ul>
        </div>
        <!-- <script>
			$(document).ready(function () {
  $("a").click(function () {
    $("a.navclass.active").removeClass("active");
    $(this).addClass("active");
  });
});

		</script> -->
      </div>
    </nav>
  </body>
</html>
