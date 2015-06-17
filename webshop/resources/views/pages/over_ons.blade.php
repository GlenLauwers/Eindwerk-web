@extends('app')

@section('content')
<div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Over ons</p>
</div>

      <div class="row col-md-12 titel">
        <h2>Over ons</h2>
      </div>

      <div class="row col-md-12">
      <div class="row col-md-6 syntra">
        <img src="{{ asset('/afbeeldingen/syntra.jpg') }}">
      </div>

      <div class="row col-md-6">
        <p>Hallo, mijn naam is Glen Lauwers en ik studeer 'Webmaster - Webontwikkelaar - Drupal Development' bij Syntra te Mechelen.
        Tijdens onze eerste module hebben we geleerd hoe we vanaf nul een website moeten opbouwen. Eerst waren dit simpele websites gemaakt in HTML-strickt.
        In de 2e module leerden we hoe we php-code moesten schrijven en gebruiken om een website interactiever te maken. Maar ook hoe we op een snelle
        manier een website reponsive kregen en hoe we javascript, jquery en SQL konden in een website plaatsen. In de derde (en laatste) module gingen we te 
        werk met Drupal.</p>
      </div>
      </div>

      <div class="row col-md-12">
      <div class="row col-md-6">
        <p>Vanaf maart 2015 gingen we werken aan ons eindwerk. We werden hiervoor goed begeleid door de heer Pascal Nosenzo. Onze eerste opdracht was: Zoek een gepast thema om een 
        webshop rond te maken. Hiervoor koos ik direct voor games. Dit omdat ik al van kleins af aan graag computerspelletjes speel. De volgende stap was een mock-up maken en deze mock-up
        omzetten naar een echte site.</p>
      </div>
      </div>
@stop