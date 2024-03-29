<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Client interface</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    @notifyCss
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href={{asset("clients/assets/css/cs-skin-elastic.css")}}>
    <link rel="stylesheet" href={{asset("clients/assets/css/style.css")}}>
    <link rel="stylesheet" href={{asset("clients/assets/css/styleadd.css")}}>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

        .container {
  width: 100%;
  height: 100%;
  margin: 3% auto;
}

.card-v {
  width: 400px;
  height: 280px;
  margin: 0 auto;
  background: linear-gradient(
    45deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(0, 140, 177, 1) 35%,
    rgba(0, 29, 125, 1) 100%
  );
  border: 1px solid rgba(0, 0, 0, 0.3);
  border-radius: 15px;
}

.intern {
  padding: 20px;
}

.approximation {
  width: 25px;
  transform: rotate(90deg);
}

.chip {
  height: 40px;
  position: relative;
  left: 80%;
  bottom: 40px;
}

.card-number {
  margin-top: 20px;
  font-size: 1.5rem;
  font-weight: 700;
  color: white;
  display: flex;
}

.card-holder {
  color: whitesmoke;
}

.card-v label {
  font-size: 0.7rem;
}

.card-infos {
  display: flex;
  width: 40%;
  justify-content: space-between;
  color: white;
}

#credit-card {
  display: flex;
  flex-direction: column;
  gap: 15px;
  font-size: 1.1rem;
  color: white;
  text-transform: uppercase;
}

.number-container,
.name-container {
  display: flex;
  flex-direction: column;
}

.expiration-container,
.cvv-container {
  width: 50%;
}

    </style>
</head>

<body>