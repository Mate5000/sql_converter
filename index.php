<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SQL konverter by Máté</title>
    <link rel="stylesheet" href="css/index.css" />
  </head>
  <body>
    <div class="demo-page">
      <div class="demo-page-navigation">
        <nav>
          <ul>
            <li>
              <a href="#kezdolap">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"-
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
              <a href="#konverter">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                Konverter</a
              >
            </li>
            <li>
              <a href="#github">
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
          <div class="href-target" id="kezdolap"></div>
          <h1 class="package-name">SQL konverter</h1>
          <p>
            Ez egy sima php oldal, mely CSV/TXT fájlokat alakít át SQL 
            prancsokká, amikkel könnyedén beszúrhatóak az adatok az 
            adatbázisba. Ez az eszköz különösen jól jön akkor, pl. ha nem áll 
            rendelkezésre phpMyAdmin kezelőfelület.
          </p>
          <strong>Funciók:</strong>
          <ul>
            <li>MYSQL parancs létrehozása</li>
            <li>Táblanév megadása</li>
            <li>Egyéni elválasztójelek használata</li>
            <li>Elsődleges kulcs beállítása</li>
            <li>Első sor beállítása oszlopcímeknek</li>
          </ul>
        </section>
        <section>
          <div class="href-target" id="konverter"></div>
          <h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
            Konverter
          </h1>
          <form action="converter.php" method="post" enctype="multipart/form-data">
          <div class="nice-form-group">
            <label>Válaszd ki az adatokat tartalmató fájlt</label>
            <input type="file" id="csv_file" name="csv_file" required />
          </div>
          <div class="nice-form-group">
            <label>A tábla neve</label>
            <input type="text" id="table_name" name="table_name" placeholder="név" required />
          </div>
          <fieldset class="nice-form-group">
            <legend>Az adatokat elválasztó karakter</legend>
            <div class="nice-form-group">
              <input type="radio" name="radio" id="tabulator" value="tabulator" checked/>
              <label for="tabulator">tabulátor</label>
            </div>
            <div class="nice-form-group">
              <input type="radio" name="radio" value="semicolon" id="semicolon" />
              <label for="semicolon">;</label>
            </div>

            <div class="nice-form-group">
              <input type="radio" name="radio" value="comma" id="comma" />
              <label for="comma">,</label>
            </div>
            <div class="nice-form-group">
              <input type="radio" name="radio" value="custom" id="custom" />
              <label for="custom">egyéni</label>
            </div>
          </fieldset>
          <div class="nice-form-group">
            <input type="text" id="delimiter" name="delimiter"  placeholder="/" maxlength="1" disabled/>    
          </div>
          <br />
          <p style="margin-bottom: 0px;">
            <strong style="display: block">Beállítások</strong>
          </p>
            <script>
          document.addEventListener('DOMContentLoaded', function() {
              var radio = document.getElementById('custom');
              var delimiterInput = document.getElementById('delimiter');
              var radios = document.getElementsByName('radio');

              radios.forEach(function(radio) {
                  radio.addEventListener('change', function() {
                      if (document.getElementById('custom').checked) {
                          delimiterInput.removeAttribute('disabled');
                          delimiterInput.setAttribute('required', '');
                      } else {
                          delimiterInput.setAttribute('disabled', '');
                          delimiterInput.removeAttribute('required');
                      }
                  });
              });
          });
            </script>
          <fieldset class="nice-form-group" style="margin-top: 0px;">
            <div class="nice-form-group">
              <input type="checkbox" id="check-1" class="switch" checked="" id="first_row_header" name="first_row_header" />
              <label for="check-1">Az első sor tartalmazza a fejlécet</label>
            </div>
            <div class="nice-form-group">
                <input type="checkbox" id="first_column_pk" class="switch" name="first_column_pk" />
                <label for="first_column_pk">Az első oszlop az elsődleges kulcs</label>
            </div>
            <div class="nice-form-group">
                <input type="checkbox" id="generate_pk" class="switch" name="generate_pk" />
                <label for="generate_pk">Generáljon az oldal automatikusan elsődleges kulcsot (id)</label>
            </div>
            <!-- if one checked then uncheck the other checkbox -->
             <!-- so that the user cannot check both -->
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                  var firstColumnPk = document.getElementById('first_column_pk');
                  var generatePk = document.getElementById('generate_pk');

                  firstColumnPk.addEventListener('change', function() {
                      if (this.checked) {
                          generatePk.checked = false;
                      }
                  });

                  generatePk.addEventListener('change', function() {
                      if (this.checked) {
                          firstColumnPk.checked = false;
                      }
                  });
              });
            </script>
           
           
          </fieldset>
          
          <details>
            <summary style="text-align: right;">
              <button class="toggle-code" >
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
                Konvertálás
              </button>
            </summary>
          </details>
        </form>
        </section>
        
        <section>
          <div class="href-target" id="github"></div>
          <h1>
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
            Github
          </h1>
          <p>
            Ha valamilyen hibát találnál, vagy valami tipped lenne, akkor
            ne hezitálj, és nyiss egy pull requestet, vagy egy bug reportot.
          </p>

          <a
            href="https://github.com/Mate5000/sql_converter"
            class="to-repo"
            target="_blank"
          >
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
              class="feather feather-external-link"
            >
              <path
                d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"
              />
              <polyline points="15 3 21 3 21 9" />
              <line x1="10" y1="14" x2="21" y2="3" />
            </svg>
            Github repóm
          </a>
        </section>

        <footer>Készítette <strong>Kósa Máté</strong></footer>
      </main>
    </div>
  </body>
</html>
