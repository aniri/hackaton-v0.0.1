# StopCozi
Acesta este proiectul Sistem de Programări Online din cadrul GovCamp 2016 organizat de ithub.gov.ro

## Licență
StopCozi este licențiat sub [licența MIT](./LICENSE.TXT).

### Cum fac deploy?

Conectează-te prin SSH la serverul de test.

#### Deployment back-end

Mergi în directorul unde ai făcut checkout la proiect şi execută următoarele comezi:

```
./build.sh
# opţional pentru a vedea când s-a terminat buildul
tmux a -t stopcozi
```

#### Deployment front-end

În directorul unde e făcut checkout la proiect, execută:

```
git pull
```

**PS**: Momentan, se lucrează la o variantă mai simplă pentru a face deployment
pe server.

Dacă s-a schimbat IP-ul serverului, pentru a actualiza fișierul de configurare
al front-endului, execută următoarea comandă(în directorul proiectului):

```
cat frontend/js/application/config.js | sed -r 's/http:\/\/[0-9\.]*/192.168.1.1/' > frontend/js/application/config.js`
```

**Notă**: Înlocuiește `192.168.1.1` cu noul IP al serverului.

### Unde îl accesez?

Poți accesa front-endul la adresa http://193.230.8.35:31082/.

**PS**: IP-ul se schimbă mereu din cauza cloudului de la Guvern. O să îl actualizăm
de câte ori este nevoie până ce îi convigem pe cei de la Guvern să atașeze
un nume de domeniu la server.