# DiplomskiRad 
Web aplikacija za prodaju kozmetickih artikala i zakazivanje termina u salonu
## O radu
U završnom radu je projektovana i implementirana Web aplikacija za upravljanje poslovanjem kozmetičkog salona. Cilj aplikacije je olakšati proces zakazivanja tretmana, praćenja inventara i upravljanja korisničkim podacima. Aplikacija je namenjena kako posetiocima koji žele kupiti proizvode, tako i registrovanim korisnicima koji žele pratiti svoje zakazane termine, kao i moderatorima koji nadgledaju zakazane termine i inventar, i administratorima koji upravljaju celokupnim sistemom. U aplikaciji su definisane četiri glavne uloge: posetioci, registrovani korisnici, moderatori i administratori. Posetioci mogu pregledati usluge i proizvode, ali ne mogu rezervisati termine ili pristupiti ličnim podacima. Registrovani korisnici imaju pristup svim funkcijama posetilaca, uz dodatnu mogućnost zakazivanja tretmana, praćenja transakcija i upravljanja ličnim podacima. Moderatori imaju privilegije nadgledanja zakazanih termina i inventara, dok administratori imaju potpunu kontrolu nad sistemom, uključujući upravljanje korisnicima, uslugama, proizvodima i finansijskim transakcijama. Tehnologije korišćene za projektovanje Web aplikacije uključuju programski jezik PHP (engl. Hypertext Preprocessor) za Backend, MySQL za upravljanje bazom podataka i Bootstrap okvir za Frontend. Bootstrap omogućava brz i odzivan dizajn, dok PHP i MySQL pružaju robustnost i efikasno upravljanje podacima, čineći aplikaciju stabilnom i jednostavnom za upotrebu.
## Kako instalirati projekat
1. Instalirati XAMPP
2. Otvoriti direktorijum u kojem je instaliran XAMPP (uglavnom C:/xampp) i u direktorijum htdocs prekopirati direktorijum OnlineKozmetika
3. Pokrenuti XAMPP control panel, zatim pokrenuti Apache i MySql
4. U pretrazivacu (Chrome, Edge, Brave...) u address baru ukucati localhost/phpmyadmin i otvoriti panel
5. Pritisnuti dugme databases, dati naziv kozmetika i pritisnuti create
6. Trebalo bi da je otvorena stranica na toj bazi, kliknuti na bazu kozmetika u levom meniju
7. Kliknuti import, zatim dugme choose file i dodati file kozmetika.sql
8. Otvoriti novi tab i ukucati u address baru localhost/OnlineKozmetika i projekat bi trebao da je podesen
9. U credentials.txt fajlu se nalaze email adrese i lozinke za postojece naloge
