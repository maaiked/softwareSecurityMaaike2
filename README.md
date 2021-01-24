## About this project

Dit project werd gemaakt voor Erasmus Hogeschool Brussel, voor het vak Software Security.
Het werd opgebouwd met Laravel - Jetstream.

## public link
Dit project wordt gehost op https://maaikedupont.be/public
De API's zijn te vinden op https://maaikedupont.be/public/blogs

Voor testfunctionaliteit kan aangelogd worden met
- voor adminfuncties: admin@mail.be - PW : Admin15!
- voor gebruikersfuncties: gebruiker@mail.be - PW : Gebruiker15!


## Registratie
- Er wordt vereist dat het wachtwoord minimum 8 karakters lang is, een cijfer, hoofdletter en speciaal karakter bevat.
Daarnaast wordt gecontroleerd of het wachtwoord minder dan 300 keer terug te vinden is in de HIBP API. Indien wel, wordt het geweigerd.
- Een user krijgt pas toegang nadat hij zijn mailadres heeft geverifieerd. Om deze feature te kunnen testen is 
het noodzakelijk dat de .env folder een Mailtrap configuratie of dergelijke bevat, om mail te kunnen verzenden en ontvangen.
- Bij registratie wordt de user standaard de waarde 'Admin' false toegewezen. 
In de MySQL kan deze waarde gewijzigd worden naar 1 ( True ) om extra rechten te verkrijgen.
- Wachtwoord worden opgeslaan met BCrypt.

## Aanmelden
- Inlog pogingen worden gethrottled. De tijdsinterval wordt verhoogdbij herhaalde mislukte pogingen.
- De gebruiker kan zijn gegevens opvragen via zijn profiel en downloaden als csv.

## Privacy verklaring
Deze is terug te vinden via de link in de footer op elke pagina

## Verwerkingsregister
Terug te vinden onder verwerkingsregister.txt


