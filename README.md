# Boolfolio

Questo é lo sviluppo della precedente repo 'laravel-auth' con l'aggiunta di relazioni tra tabelle, miglioramenti grafici e un cursore personalizzato e animato

## Tabelle

Le tabelle che hanno relazione fra loro sono la tabella types e la tabella projects

## Funzionalità

La funzionalità principale consente agli utenti di:

-   Si puó visualizzare l'elenco dei progetti dopo aver effettuato l'accesso
-   Aggiungere nuovi progetti
-   Modificare progetti esistenti
-   Contrassegnare i progetti con un tipo
-   Eliminare i progetti

C'è anche un cursore personalizzato che cambia passando con il mouse su un'attività:

Il cursore é caratterizzato da una bolla che segue una pallina piccola, e da un'animazione che si muove con il mouse:

![follow](readme-img/follow.png) ![cursor-static](readme-img/cursor-static.png)

On hover invece, su link e button la bolla si gonfierá, sempre con un'animazione, c'é tra l'altro un effetto di inversione dei colori per non compromettere la leggibilitá:

![on-hover](readme-img/on-hover.png)

## Aggiornamento Funzioni

Sono state aggiunte funzioni di modifica dei Tipi e delle Tecnologie.

La descrizione e la lista teconologie sono state spostate in una nuova finestra info, accessibile da un pulsante 'INFO' nella tabella admin.

## Fix Bug 1

-   Sono stati corretti minimi errori visivi quando veniva aggiornata la pagina
-   Ora il puntatore é stato allineato a quello di sistema ed é piú preciso di prima, rendendo l'utilizzo facile e comodo
-   Sono stati corretti errori di stile e l'animazione del cursore è stata migliorata per renderla piú soddisfacente durante la navigazione
-   Gli allert che non apparivano alle modifiche, creazioni o eliminazioni di progetti sono stati riportati, aggiungendo un colore diverso per ognuno di essi
-   Ora il sito utilizza la stessa tabella di creazione e omdifica sia per i tipi che per le tecnologie, diminuendo il peso e aumentando la velocitá
