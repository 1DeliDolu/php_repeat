# Laravel

## PHP-Ordner (`D:\xampp\php`) zu den Umgebungsvariablen (PATH) unter Windows 11 hinzufügen

### 1. Fenster „Umgebungsvariablen“ öffnen

* Klicke auf das **Startmenü** und gib „**Umgebungsvariablen**“ ein.
* Oder:

  1. Klicke mit der rechten Maustaste auf „**Dieser PC**“ und wähle **Eigenschaften**.
  2. Klicke links auf „**Erweiterte Systemeinstellungen**“.
  3. Im Fenster „**Systemeigenschaften**“ klicke unten auf „**Umgebungsvariablen...**“.

---

### 2. PATH-Variable bearbeiten

* Im neuen Fenster gibt es zwei Bereiche: **Benutzervariablen** und **Systemvariablen**.
* Suche in einem Bereich die Variable **Path** und wähle sie aus.
* Klicke auf „**Bearbeiten...**“.

---

### 3. Neuen Pfad hinzufügen

* Klicke rechts auf „**Neu**“.
* Gib folgendes ein:

  ```
  D:\xampp\php
  ```
* Bestätige alles mit „**OK**“ und schließe alle Fenster.

---

### 4. Überprüfen, ob alles funktioniert

* Öffne die **Eingabeaufforderung** (cmd): Gib im Startmenü „cmd“ ein und starte sie.
* Tippe folgenden Befehl ein:

  ```
  php -v
  ```
* Wenn die PHP-Versionsnummer erscheint, ist alles korrekt eingestellt.

---

#### Begriffe erklärt

* **Umgebungsvariable (Environment Variable):**
  Eine Einstellung, die das Betriebssystem und Programme zur Konfiguration nutzen. Zum Beispiel, wo Programme installiert sind oder wie sie gestartet werden können.
* **PATH-Variable:**
  Eine besondere Umgebungsvariable, die dem System sagt, in welchen Ordnern nach ausführbaren Dateien gesucht werden soll, wenn du einen Befehl (wie `php`) eingibst.

---

#### Hinweise

* Kontrolliere genau, ob der Pfad stimmt (`D:\xampp\php`).
* Nach der Änderung die **Eingabeaufforderung neu starten** oder ggf. den Computer neustarten.
* In Windows 11 kann man pro Zeile einen Pfad eintragen; ältere Windows-Versionen trennen Pfade mit Semikolon (`;`).

---

**Fragen oder Probleme?**
Wenn eine Fehlermeldung kommt, kannst du sie hier posten. Ich helfe gern weiter!
