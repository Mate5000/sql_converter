<?php
session_start();
if (isset($_SESSION['sql_content'])) {
  $sql_command = $_SESSION['sql_content'];
} else{
  header("Location: ../");
}

?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SQL konverter by Máté</title>
    <link rel="stylesheet" href="../css/index.css" />
  </head>
  <body>
    <div class="demo-page">
      <div class="demo-page-navigation">
        <nav>
          <ul>
            <li>
              <a href="../#kezdolap">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-sliders"
                ><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Kezdőlap</a
              >
            </li>
            
            <li>
              <a href="../#konverter">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                Konverter</a
              >
            </li>
            <li>
              <a href="../#github">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-github"
                >
                  <path
                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                  />
                </svg>
                Github</a
              >
            </li>
          </ul>
        </nav>
      </div>
      <main class="demo-page-content">

        <section>
          <div class="href-target" id="sql_parancs"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
            Kész sql parancs
          </h1>
          <!-- <p>
            A szerver a következő hibaüzenetet adta vissza: <code><?php  if (isset($_SESSION['hiba'])) {  echo $_SESSION['hiba']; } ?></code> 
            
          </p> -->
          <div class="nice-form-group">
            <textarea id="sql_output" rows="20" value="" readonly><?php echo $sql_command; ?></textarea>
          </div>
         
          
          <details>
            <summary style="text-align: right;">
              <button class="toggle-code" onclick="masolas()" >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-code"
                >
                  <polyline points="16 18 22 12 16 6" />
                  <polyline points="8 6 2 12 8 18" />
                </svg>
                Másolás
              </button>
            </summary>
          </details>
        </form>
        </section>
        <!-- <script src="../js/autosize.js"></script> -->
        <script>
          function masolas() {
            var sql = document.getElementById('sql_output');
            sql.select();
            document.execCommand('copy');
            alert("Sikeresen kimásolva");
        }

        </script>
        <footer>Készítette <strong>Kósa Máté</strong></footer>
      </main>
    </div>
  </body>
</html>
