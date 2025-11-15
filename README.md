# Studio di Ingegneria e Architettura - Mirko Corona

Sito web professionale per lo Studio di Ingegneria e Architettura di Mirko Corona.

## 🎯 Caratteristiche

- **Design Moderno**: Interfaccia pulita e professionale adatta ad uno studio di ingegneria
- **Completamente Responsive**: Ottimizzato per desktop, tablet e mobile
- **Form di Contatto Funzionante**: Integrazione email diretta a mirkocorona@libero.it
- **Sezioni Principali**:
  - Hero section con call-to-action
  - Chi Siamo con statistiche
  - Servizi offerti (6 servizi principali)
  - Portfolio progetti con galleria immagini e lightbox
  - Sezione contatti con form interattivo
  - Footer informativo

## 🚀 Come Utilizzare

### Opzione 1: Visualizzazione Locale (Solo Demo)
1. Apri il file `index.html` nel browser
2. **Nota**: Il form di contatto non funzionerà localmente perché richiede PHP

### Opzione 2: Deploy con Supporto PHP (Consigliato)
1. Carica tutti i file su un server web con supporto PHP (versione 5.6 o superiore)
2. Assicurati che la funzione `mail()` di PHP sia abilitata sul server
3. Il form invierà automaticamente le email a mirkocorona@libero.it

### Opzione 3: Deploy senza PHP (Hosting Statico)
Se il tuo hosting non supporta PHP (es. GitHub Pages, Netlify, Vercel), consulta la sezione [Soluzioni Alternative](#-soluzioni-alternative-senza-php) più sotto.

## 📧 Sistema di Invio Email del Form

### Come Funziona

Il form di contatto raccoglie le seguenti informazioni:
- Nome e Cognome (obbligatorio)
- Email (obbligatorio)
- Telefono (facoltativo)
- Servizio di interesse (facoltativo)
- Messaggio (obbligatorio)

Quando un utente compila e invia il form:

1. **Validazione Client-Side**: JavaScript valida i campi prima dell'invio
2. **Invio Sicuro**: I dati vengono inviati al file `send-email.php` tramite AJAX
3. **Validazione Server-Side**: PHP verifica e sanifica tutti i dati
4. **Invio Email**: Il messaggio viene inviato a `mirkocorona@libero.it`
5. **Feedback Utente**: L'utente riceve una conferma visiva del successo o errore

### Requisiti Tecnici (Soluzione PHP)

- Server web con PHP 5.6 o superiore
- Funzione `mail()` di PHP abilitata
- Headers HTTP corretti configurati

### Configurazione

Il file `send-email.php` è già configurato per inviare email a `mirkocorona@libero.it`. Se necessario modificare l'indirizzo destinatario:

1. Apri `send-email.php`
2. Trova la riga: `$to = 'mirkocorona@libero.it';`
3. Sostituisci con il nuovo indirizzo email

### Sicurezza

Il sistema implementa le seguenti misure di sicurezza:
- Validazione e sanitizzazione di tutti gli input
- Protezione contro XSS (Cross-Site Scripting)
- Header di sicurezza HTTP
- Validazione del formato email
- Limitazione ai soli metodi POST

### Test del Form

Per verificare che il form funzioni correttamente:

1. Visita il sito pubblicato (non in locale)
2. Scorri alla sezione "Contatti"
3. Compila tutti i campi obbligatori
4. Clicca su "Invia Messaggio"
5. Dovresti vedere un messaggio di conferma verde
6. Controlla l'inbox di mirkocorona@libero.it per il messaggio ricevuto

### Risoluzione Problemi

**Il form non invia email:**
- Verifica che PHP sia installato e funzionante sul server
- Controlla che la funzione `mail()` sia abilitata (alcuni hosting la disabilitano per default)
- Verifica i log del server per eventuali errori PHP
- Alcuni server richiedono configurazione SMTP aggiuntiva

**Email finiscono nello spam:**
- Questo è comune con la funzione `mail()` di PHP
- Considera l'utilizzo di un servizio SMTP professionale (vedi sezione Alternative)
- Configura correttamente SPF e DKIM per il tuo dominio

## 🔄 Soluzioni Alternative (senza PHP)

Se il tuo hosting non supporta PHP o la funzione `mail()` non è disponibile, puoi utilizzare uno di questi servizi:

### Opzione A: Formspree (Consigliato per Semplicità)

1. Vai su [https://formspree.io](https://formspree.io)
2. Crea un account gratuito
3. Crea un nuovo form e ottieni l'endpoint URL
4. Modifica `script.js`, sostituendo la riga:
   ```javascript
   const response = await fetch('send-email.php', {
   ```
   con:
   ```javascript
   const response = await fetch('https://formspree.io/f/YOUR_FORM_ID', {
   ```
5. Rimuovi il file `send-email.php` (non più necessario)

**Vantaggi**: 
- Gratuito fino a 50 invii/mese
- Configurazione rapida
- Protezione anti-spam inclusa
- Notifiche email automatiche

### Opzione B: EmailJS

1. Vai su [https://www.emailjs.com](https://www.emailjs.com)
2. Crea un account gratuito
3. Configura un servizio email e un template
4. Installa EmailJS e aggiorna `script.js` seguendo la [documentazione ufficiale](https://www.emailjs.com/docs/)

**Vantaggi**: 
- Gratuito fino a 200 email/mese
- Supporto per template personalizzati
- Invio diretto da JavaScript

### Opzione C: Netlify Forms (per hosting su Netlify)

1. Aggiungi `netlify` al tag `<form>` in `index.html`:
   ```html
   <form id="contactForm" class="contact-form" name="contact" netlify>
   ```
2. Netlify gestirà automaticamente gli invii
3. Configura le notifiche email dal pannello Netlify

**Vantaggi**: 
- Integrazione nativa con Netlify
- Gratuito fino a 100 invii/mese
- Anti-spam integrato

## 📁 Struttura File

```
├── index.html           # Struttura HTML principale
├── styles.css           # Stili e design responsive
├── script.js            # Interattività e animazioni JavaScript
├── send-email.php       # Backend PHP per invio email
├── images/              # Directory delle immagini dei progetti
└── README.md            # Questa documentazione
```

## ⚙️ Personalizzazione

Per personalizzare il sito:

1. **Informazioni di contatto**: Modifica i dettagli in `index.html` nella sezione contatti (riga 319-345)
2. **Indirizzo email destinatario**: Modifica in `send-email.php` (riga 38)
3. **Colori**: Modifica le variabili CSS in `styles.css` nella sezione `:root` (righe 10-33)
4. **Progetti**: Sostituisci le immagini nella cartella `images/` e aggiorna i riferimenti in `index.html`
5. **Contenuti**: Aggiorna testi e descrizioni secondo le tue esigenze

## 🛠️ Tecnologie

- HTML5 semantico
- CSS3 con variabili, grid, flexbox e animazioni
- JavaScript vanilla (ES6+) - nessuna dipendenza esterna
- PHP 5.6+ (per backend email)
- Google Fonts (Montserrat, Playfair Display)

## 📱 Responsive Design

Il sito è completamente ottimizzato per dispositivi mobili con:
- Meta viewport tag configurato
- Layout fluido e adattivo
- Media queries per tablet (768px) e smartphone (576px)
- Navigazione mobile con menu hamburger
- Form e immagini ottimizzati per touch
- Font size ottimizzati per leggibilità mobile (16px per evitare zoom automatico iOS)

### Breakpoint Responsive
- Desktop: > 968px
- Tablet: 768px - 968px  
- Mobile: < 768px
- Small Mobile: < 576px

## 📱 Browser Supportati

- Chrome/Edge (ultime 2 versioni)
- Firefox (ultime 2 versioni)
- Safari (ultime 2 versioni)
- Mobile Safari (iOS 12+)
- Chrome Mobile (Android 8+)

## 🔧 Hosting Consigliati

### Con Supporto PHP:
- **SiteGround** (ottimo supporto PHP e mail)
- **Aruba** (provider italiano, configurazione email semplice)
- **HostGator** (economico, supporto PHP/mail)

### Hosting Statico (richiede soluzione alternativa):
- **GitHub Pages** (gratuito) + Formspree
- **Netlify** (gratuito) + Netlify Forms
- **Vercel** (gratuito) + EmailJS

## 🚨 Limitazioni Note

1. **Funzione mail() PHP**: Alcuni hosting economici disabilitano la funzione `mail()` per prevenire spam. Verifica con il tuo provider.

2. **Rate Limiting**: Considera l'implementazione di un sistema di rate limiting per prevenire spam (es. max 5 invii per IP all'ora).

3. **Email in Spam**: Le email inviate tramite `mail()` PHP possono finire nello spam. Per evitare ciò:
   - Configura correttamente SPF/DKIM per il dominio
   - Usa un servizio SMTP professionale
   - Oppure usa servizi come Formspree/EmailJS

## 📞 Supporto

Per domande o problemi:
- Email: mirkocorona@libero.it
- Telefono: +39 3200679874

## 📄 Licenza

© 2024 Studio di Ingegneria e Architettura Mirko Corona. Tutti i diritti riservati.

