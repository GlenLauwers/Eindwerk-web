@extends('app')

@section('content')
<div class="row col-md-12 titel">
    <p><a href="{{ asset('/home') }}">Home</a>>Voorwaarden</p>
    <h1>Voorwaarden</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')      
</div>

<div class="row col-md-4">
	<h2>Gratis verzending</h2>
	<p>Bij Game Action heb je altijd de keuze voor gratis bezorging. Bestel voor 23.59 uur en ontvang het de volgende dag al gratis in huis. Zelfs op zondag. Wil je het op maandag ontvangen? Bestel dan op zondag voor 20.00 uur.</p>
	<p>Ben je niet thuis? Dan wordt het pakketje op maandag t/m zaterdag (indien mogelijk) afgeleverd bij je buren. Of de bezorger komt de volgende dag nog eens langs.</p>
</div>

<div class="row col-md-4">
	<h2>30 dagen bedenktijd</h2>
	<p>Bij Game Action mag je 30 dagen nadenken over je aankoop. Zo kun je uitgebreid je artikel bestuderen en ervaren of deze volledig naar wens is.
		De bedenktijd voor aankopen bij andere verkopers of tweedehands artikelen kan afwijken, check de voorwaarden van de verkoper.</p>
	<p>Ben je toch niet tevreden over het artikel? Dan mag je het gratis retourneren en krijg je het gehele aankoopbedrag teruggestort op je rekening. Heb je betaald met een cadeaubon, dan wordt je cadeaubon weer opgewaardeerd.
Retourneren van artikelen bij andere verkopers en tweedehands is niet altijd gratis. Check de voorwaarden van de verkoper.</p>
</div>

<div class="row col-md-4">
	<h2>Vandaag besteld, morgen in huis</h2>
	<p>Bestel je op werkdagen voor 23:00 uur, dan geldt voor het grootste deel van ons assortiment dat je artikel de volgende dag al wordt geleverd.
Wij doen ons uiterste best om elke bestelling zo snel mogelijk te bezorgen. Wij zijn voor een deel wel afhankelijk van externe partijen, waardoor de levering in een enkel geval vertraagd kan zijn.
Bij een aantal producten en in een aantal postcodegebieden leveren we ook ’s avonds. Of dit voor jouw bestelling mogelijk is, zie je bij het bestellen.</p>
</div>

@stop