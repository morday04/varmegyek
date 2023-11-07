<!DOCTYPE html>
<html>
    <head>
        <title>Workshop</title>
    </head>

    <body>
        <p>Tisztelt {{$client->name}}</p>
        <p>Tájékoztatjuk, hogy nyilvántartásunk szerint {{$vehicle->registration_plate}} rendszámú járműve műszaki érvényessége {{$vehicle->valid_until}}-n lejár.
        Kérjük, vegye fel a kapcsolatot szervízünkkel időpontfoglalás céljából.
        </p>
        <p>Üdvözlettel,<br>
        Workshop<br>
        tel: +36.70.....<br>
        email: info@workshop.hu<br>
        </p>
    </body>
</html>
