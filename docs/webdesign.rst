.. 

Web shop Design
===============

Allgemeines
-----------
Die verwendete Firma und ihre Daten sind fiktiv. Es existiert keine Verbindung
zu irgendwelchen Unternehmen mit ähnlichen oder gleichen Namen.

Firmenname
^^^^^^^^^^
Der Firmenname ist: **Pencil AG**

Anschrift
^^^^^^^^^
Die komplette Anschrift lautet::

    Pencil AG
    Musterstrasse 1
    3000 Bern
    Schweiz

Logo
^^^^
Das Logo, welches in diesem Projekt verwendet wird, kommt aus dem Icon-Set des
`Tango-Projekts`_. Die Datei kommt aus der Gruppe `categories`, der Dateiname
der Original-Datei ist ``applications-office.svg`` und steht unter der Public
Domain.

.. image:: images/logo.png
    :align: center
    :alt: Pencil AG Logo

.. _Tango-Projekts: http://tango.freedesktop.org/

.. _layout:

Layout
------
Das Layout gliedert sich in diverse Abschnitte. Die Inhalte der Elemente,
speziell des Hauptbereichs (Content), werden durch die spätere Verwendung
der Seite definiert.

.. image:: images/prototyp1.png
    :width: 400px
    :align: center
    :alt: Prototyp für das Layout

Sitemap
-------
Die Sitemap für den Shop kurz nach Projektbeginn sah, wie nachfolgend gezeigt,
aus.

.. image:: images/sitemap1.png
    :width: 600px
    :align: center
    :alt: Pencil Webshop Sitemap

Haupt-Seite
-----------

Der erste Entwurf der Hauptseite basiert auf dem Prototyp, gezeigt in Abschnitt
:ref:`layout`, ohne Format- und Stil-Informationen. ::

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Webshop Pencil AG für Bleistifte">
            <meta name="author" content="Fabian Affolter">
            <title>Webshop Pencil AG | Home</title>
        </head>

        <body>
            <!-- Header container-->
            <div>
                <div>
                  <!-- Logo and company name -->
                  <img src="logo/logo.png">
                  <h2>Webshop Pencil AG</h2>
                  <!-- Navigation -->
                  <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Produkte</a></li>
                      <li><a href="#">Über uns</a></li>
                  </ul>
                  <!-- Breadcrumb -->
                  <ol>
                      <li><a href="#">Ebene 1</a></li>
                      <li><a href="#">Ebene 2</a></li>
                      <li><a href="#">Ebene 3</a></li>
                  </ol>
                </div>
            </div>
            <!-- Header container-->

            <!-- Action container -->
            <div>
                <h1>Wochen-Aktion</h1>
                <p>Dies ist eine super Aktion. 10 Bleistifte für CHF 8.</p>
            </div>
            <!-- Action container -->

            <!-- Selected products -->
            <div>
                <p>Hier hat es zufällige Produkte...</p>
            </div>
            <!-- Selected products -->

            <!-- Footer -->
            <div>
                <p>&copy; Pencil AG 2013</p>
            <!-- Footer -->
            </div>
        </body>
    </html>

In einem Browser dargestellt, sieht die Seite wie in nachfolgend gezeigten 
:ref:`Screenshot <main1>` aus.

.. _main1:

.. image:: images/main1.png
    :width: 400px
    :align: center
    :alt: Screenshot der Seite in Midori
