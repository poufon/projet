@extends('layouts.app')

@section('content')

    <div class="row">
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Effectif total des employés</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <div class="small text-white"><i class="fas fa-user fa-fw"></i><main> Employés</main></div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="d-flex">
        <div
        id="myCharte" style="width:100%; max-width:600px; height:500px;">
        </div>
        <div id="myCharts" style="width:100%; max-width:600px; height:500px;">
        </div>
        {{-- <div id="myChart" style="width:100%; max-width:600px; height:500px;">
        </div> --}}
    </div>
    <div class="container" style="width: 40%;margin-left: auto;margin-right: auto">
        <canvas id="myChartx"></canvas>
    </div>

@endsection



@section('js')
<script>
    const ctx = document.getElementById('myChartx');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Congé Annuel', 'Congé Maladie', 'Congé Exceptionnel', 'Congé_sans_solde'],
            datasets: [{
            label: 'Repartion des differents types de congé pris en fonction du nombre d\'Employé',
            data: [{{ $Congé_annuel ?? 0 }}, {{ $congeMaladie ?? 0 }}, {{ $Congé_exceptionnel ?? 0 }}, {{ $Congé_sans_solde ?? 0 }}],
            borderWidth: 1
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        }
    });
</script>
@endsection
@section('js2')
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);
        // google.charts.setOnLoadCallback(drawCharts);



        function drawCharts() {

            // Set Data
            const datas = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            ['HOMMES',{{ $Nbre_Empl_Homme }}],
            ['FEMMES',{{ $Nbre_Empl_Femme }}]
            ]);

            // Set Options
            const options = {
            title:'REPARTITION DES EMPLOYES ',
            is3D:true
            };

            // Draw
            const chart = new google.visualization.PieChart(document.getElementById('myCharts'));
            chart.draw(datas, options);


        }
    </script>
@endsection
@section('js3')
    <script>


        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChartt);
            // google.charts.setOnLoadCallback(drawCharts);

        function drawChartt() {



            // Set Data
            const data = google.visualization.arrayToDataTable([
            ['Contrat', 'Mhl'],
            ['CDI',{{ $Nbre_Cont_CDI ?? 0 }}],
            ['CDD',{{ $Nbre_Cont_CDD ?? 0 }}],
            ['intérim',{{ $Nbre_Cont_CDI1 ?? 0 }}],
            ['Contrat à temps partiel',{{ $Nbre_Cont_CDD2 ?? 0 }}],
            ['Contrat de professionnalisation',{{ $Nbre_Cont_CDI3 ?? 0 }}],
            ['Contrat d\'apprentissage',{{ $Nbre_Cont_CDD4 ?? 0 }}],
            ['Contrat de travail saisonnier',{{ $Nbre_Cont_CDI5 ?? 0 }}],
            ['Contrat de prestation de services',{{ $Nbre_Cont_CDD6 ?? 0 }}],
            ['SOUS-TRAITENCE',{{ $Nbre_Cont_CDI7 ?? 0 }}]
            ]);

            // Set Options
            const options = {
            title:'REPARTITION DES EMPLOYE EN FONCTION DU TYPE DE CONTRAT',
            is3D:true
            };

            // Draw
            const chart = new google.visualization.PieChart(document.getElementById('myCharte'));
            chart.draw(data, options);

        }
    </script>
@endsection
{{-- @section('name')


    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        // Set Data
        const data = google.visualization.arrayToDataTable([
        ['Contry', 'Mhl'],
        ['Italy',54.8],
        ['France',48.6],
        ['Spain',44.4],
        ['USA',23.9],
        ['Argentina',14.5]
        ]);

        // Set Options
        const options = {
        title:'World Wide Wine Production',
        is3D:true
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

        }
    </script>
@endsection --}}
