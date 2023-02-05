<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Dashbord</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/welcome.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- ChartJS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      </head>
    <body style="overflow: visible">
      <div >
        {{-- <div id="hide" class="d-none"> --}}
        <nav class="navbar navbar-expand-lg px-5">
            <a class="navbar-brand" href="/">Gestion des formations</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('types.index') }}">Types</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('referentiels.index') }}">Référentiels</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('formations.index') }}">Formations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('candidats.index') }}">Candidats</a>
                </li>
              </ul>
            </div>
        </nav>
        <main class="container mt-5 ">
          <div class="row">
            <div class="col">
              <canvas id="candidats_par_formation"></canvas>
            </div>
            <div class="col">
              <canvas id="candidats_par_sexe"></canvas>
            </div>
            <div class="col">
              <canvas id="candidats_par_age"></canvas>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
              <canvas id="referentiel_par_formation"></canvas>
            </div>
            <div class="col">
              <canvas id="referentiels_par_type"></canvas>
            </div>
            <div class="col">
              <canvas id="formation_par_etat"></canvas>
            </div>
          </div>
        </main>
      </div>
        <!-- partial:index.partial.html -->
      {{-- <div>
        <div class="background background0"></div>
        <div class="background background1"></div>
        <div class="background background2"></div>
        <div class="background background3"></div>
        <div class="background background4"></div>
        <div class="background background5"></div>
        <div class="background background6"></div>
        <div class="background background7"></div>
        <div class="criterion">
        <div class="text text0">F</div>
        <div class="text text1">A</div>
        <div class="text text2">Z</div>
        <div class="text text3">E</div>
        <div class="text text4">Y</div>
        <div class="text text5">N</div>
        <div class="text text6">A</div>
        <div class="text text7">: )</div>
        <div class="frame frame0"></div>
        <div class="frame frame1"></div>
        <div class="frame frame2"></div>
        <div class="frame frame3"></div>
        <div class="frame frame4"></div>
        <div class="frame frame5"></div>
        <div class="frame frame6"></div>
        <div class="frame frame7"></div>
        <div class="particle particle00"></div>
        <div class="particle particle01"></div>
        <div class="particle particle02"></div>
        <div class="particle particle03"></div>
        <div class="particle particle04"></div>
        <div class="particle particle05"></div>
        <div class="particle particle06"></div>
        <div class="particle particle07"></div>
        <div class="particle particle08"></div>
        <div class="particle particle09"></div>
        <div class="particle particle010"></div>
        <div class="particle particle011"></div>
        <div class="particle particle10"></div>
        <div class="particle particle11"></div>
        <div class="particle particle12"></div>
        <div class="particle particle13"></div>
        <div class="particle particle14"></div>
        <div class="particle particle15"></div>
        <div class="particle particle16"></div>
        <div class="particle particle17"></div>
        <div class="particle particle18"></div>
        <div class="particle particle19"></div>
        <div class="particle particle110"></div>
        <div class="particle particle111"></div>
        <div class="particle particle20"></div>
        <div class="particle particle21"></div>
        <div class="particle particle22"></div>
        <div class="particle particle23"></div>
        <div class="particle particle24"></div>
        <div class="particle particle25"></div>
        <div class="particle particle26"></div>
        <div class="particle particle27"></div>
        <div class="particle particle28"></div>
        <div class="particle particle29"></div>
        <div class="particle particle210"></div>
        <div class="particle particle211"></div>
        <div class="particle particle30"></div>
        <div class="particle particle31"></div>
        <div class="particle particle32"></div>
        <div class="particle particle33"></div>
        <div class="particle particle34"></div>
        <div class="particle particle35"></div>
        <div class="particle particle36"></div>
        <div class="particle particle37"></div>
        <div class="particle particle38"></div>
        <div class="particle particle39"></div>
        <div class="particle particle310"></div>
        <div class="particle particle311"></div>
        <div class="particle particle40"></div>
        <div class="particle particle41"></div>
        <div class="particle particle42"></div>
        <div class="particle particle43"></div>
        <div class="particle particle44"></div>
        <div class="particle particle45"></div>
        <div class="particle particle46"></div>
        <div class="particle particle47"></div>
        <div class="particle particle48"></div>
        <div class="particle particle49"></div>
        <div class="particle particle410"></div>
        <div class="particle particle411"></div>
        <div class="particle particle50"></div>
        <div class="particle particle51"></div>
        <div class="particle particle52"></div>
        <div class="particle particle53"></div>
        <div class="particle particle54"></div>
        <div class="particle particle55"></div>
        <div class="particle particle56"></div>
        <div class="particle particle57"></div>
        <div class="particle particle58"></div>
        <div class="particle particle59"></div>
        <div class="particle particle510"></div>
        <div class="particle particle511"></div>
        <div class="particle particle60"></div>
        <div class="particle particle61"></div>
        <div class="particle particle62"></div>
        <div class="particle particle63"></div>
        <div class="particle particle64"></div>
        <div class="particle particle65"></div>
        <div class="particle particle66"></div>
        <div class="particle particle67"></div>
        <div class="particle particle68"></div>
        <div class="particle particle69"></div>
        <div class="particle particle610"></div>
        <div class="particle particle611"></div>
        <div class="particle particle70"></div>
        <div class="particle particle71"></div>
        <div class="particle particle72"></div>
        <div class="particle particle73"></div>
        <div class="particle particle74"></div>
        <div class="particle particle75"></div>
        <div class="particle particle76"></div>
        <div class="particle particle77"></div>
        <div class="particle particle78"></div>
        <div class="particle particle79"></div>
        <div class="particle particle710"></div>
        <div class="particle particle711"></div>
      </div> --}}
    </body>
      <script>
        setTimeout(() => {
          document.getElementById("hide").classList.remove("d-none");
        }, "5000")
      </script>
        
      {{-- CANDIDATS PAR FORMATION --}}
      <script type="text/javascript">
        var labels_can_par_form =  {{ Js::from($labels_can_par_form) }};
        var effectif_can_par_form =  {{ Js::from($effectif_can_par_form) }};

        const data = {
          labels: labels_can_par_form,
          datasets: [{
            label: 'Candidats par formation',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: effectif_can_par_form,
          }]
        };

        const config = {
          type: 'line',
          data: data,
          options: {}
        };

        const candidats_par_formation = new Chart(
          document.getElementById('candidats_par_formation'),
          config
        );
      </script>

      {{-- FORMATIONS PAR REFERENTIEL --}}
      <script type="text/javascript">
        var labels_form_par_ref =  {{ Js::from($labels_form_par_ref) }};
        var effectif_form_par_ref =  {{ Js::from($effectif_form_par_ref) }};

        const data2 = {
          labels: labels_form_par_ref,
          datasets: [{
            label: 'Formations par référentiel',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: effectif_form_par_ref,
          }]
        };

        const config2 = {
          type: 'line',
          data: data2,
          options: {}
        };

        const referentiel_par_formation = new Chart(
          document.getElementById('referentiel_par_formation'),
          config2
        );
      </script>

      {{-- CANDIDATS PAR SEXE --}}
      <script type="text/javascript">
        var labels_can_par_sexe =  {{ Js::from($labels_can_par_sexe) }};
        var effectif_can_par_sexe =  {{ Js::from($effectif_can_par_sexe) }};

        const data3 = {
          labels: labels_can_par_sexe,
          datasets: [
            {
              label: 'Sexe',
              data: effectif_can_par_sexe,
              // backgroundColor: [
              //   'rgb(255, 99, 132)',
              //   'rgb(54, 162, 235)',
              // ]
            }
          ]
        };

        const config3 = {
          type: 'doughnut',
          data: data3,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Candidats par sexe'
              }
            }
          },
        };

        const candidats_par_sexe = new Chart(
          document.getElementById('candidats_par_sexe'),
          config3
        );
      </script>

      {{-- FORMATIONS PAR TYPE --}}
      <script type="text/javascript">
        var labels_ref_par_type =  {{ Js::from($labels_ref_par_type) }};
        var effectif_ref_par_type =  {{ Js::from($effectif_ref_par_type) }};

        const data4 = {
          labels: labels_ref_par_type,
          datasets: [
            {
              label: 'Type',
              data: effectif_ref_par_type,
            }
          ]
        };

        const config4 = {
          type: 'doughnut',
          data: data4,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Référentiels par type'
              }
            }
          },
        };

        const referentiels_par_type = new Chart(
          document.getElementById('referentiels_par_type'),
          config4
        );
      </script>

       {{-- CANDIDATS PAR AGE --}}
       <script type="text/javascript">
        var labels_can_par_age =  {{ Js::from($labels_can_par_age) }};
        var effectif_can_par_age =  {{ Js::from($effectif_can_par_age) }};

        const data5 = {
          labels: labels_can_par_age,
          datasets: [{
            label: 'Candidats par âge',
            data: effectif_can_par_age,
            borderWidth: 1
          }]
        };

        const config5 = {
          type: 'bar',
          data: data5,
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },
        };

        const candidats_par_age = new Chart(
          document.getElementById('candidats_par_age'),
          config5
        );
      </script>

        {{-- FORMATIONS PAR ETAT --}}
        <script type="text/javascript">
          var labels_form_par_etat =  {{ Js::from($labels_form_par_etat) }};
          var effectif_form_par_etat =  {{ Js::from($effectif_form_par_etat) }};
  
          const data6 = {
            labels: labels_form_par_etat,
            datasets: [{
              label: 'Nombre',
              data: effectif_form_par_etat,
              borderWidth: 1
            }]
          };
  
          const config6 = {
            type: 'bar',
            data: data6,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            },
          };
  
          const formation_par_etat = new Chart(
            document.getElementById('formation_par_etat'),
            config6
          );
        </script>
</html>
