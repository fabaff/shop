.. 

Basics
======

Products
--------
The Web shop will be for selling pencils in various types.

Categories:

- Standard pencils
- Mechnical pencils
- Spezial pencils

Variants or options:

- Color (red, yellow, black, white, etc.)
- Hardness (standard: HB; hard: F, H, 2H; soft: B, 2B)
- Additional function (Eraser at the end, Protection cap, handle) 


Product overview
^^^^^^^^^^^^^^^^
(The product names are in German because the main language of the shop will
not be English)
+------------------------+------------+----------+----------+------------+
| Type                   | Variant    | Color    | Hardness | Price CHF  |
+========================+============+==========+==========+============+
| Bleistift              | keine      | rot      | HB       | 1          |
+------------------------+------------+----------+----------+------------+
| Bleistift              | keine      | rot      | B        | 1          |
+------------------------+------------+----------+----------+------------+
| Bleistift              | keine      | rot      | 2B       | 1          |
+------------------------+------------+----------+----------+------------+
| Bleistift              | keine      | gelb     | F        | 1.20       |
+------------------------+------------+----------+----------+------------+
| Bleistift              | keine      | gelb     | H        | 1.20       |
+------------------------+------------+----------+----------+------------+
| Bleistift              | keine      | gelb     | 2H       | 1.20       |
+------------------------+------------+----------+----------+------------+
| Bleistift              | Gummi      | rot      | HB       | 1.10       |
+------------------------+------------+----------+----------+------------+
| Schreiner-Bleistift    | keine      | rot      | HB       | 1.80       |
+------------------------+------------+----------+----------+------------+
| Schreiner-Bleistift    | keine      | rot      | B        | 1.80       |
+------------------------+------------+----------+----------+------------+
| Bleistift              | keine      | rot      | HB       | 0.5        |
+------------------------+------------+----------+----------+------------+
| Bleistift              | Gummi      | rot      | HB       | 0.6        |
+------------------------+------------+----------+----------+------------+
| Künstler-Bleistift     | Griff      | gelb     | 2B       | 2          |
+------------------------+------------+----------+----------+------------+
| Künstler-Bleistift     | Griff      | rot      | 2B       | 2          |
+------------------------+------------+----------+----------+------------+
| Künstler-Bleistift     | Griff      | schwarz  | 2B       | 2          |
+------------------------+------------+----------+----------+------------+
| Minien-Bleistift       | keine      | weiss    |          | 4          |
+------------------------+------------+----------+----------+------------+
| Minien-Bleistift       | keine      | blau     |          | 4          |
+------------------------+------------+----------+----------+------------+
| Minien-Bleistift       | keine      | gelb     |          | 4          |
+------------------------+------------+----------+----------+------------+
| Minien-Bleistift       | keine      | rot      |          | 4          |
+------------------------+------------+----------+----------+------------+
| Minien-Bleistift       | keine      | silber   |          | 9          |
+------------------------+------------+----------+----------+------------+
| Minien-Bleistift       | keine      | schwarz  |          | 9          |
+------------------------+------------+----------+----------+------------+

Personas
--------
The following personas are defined to interact with the web shop.

Major customer
^^^^^^^^^^^^^^
Eva ist verantwortlich für die Büromaterialbestellungen in ihrer Holzbau-Firma.
Sie bestellt zweimal pro Monat eine grössere Menge von Bleistiften für diverse
Verbraucher (Management, Büro und Fertigung. Eva hat ein fixes Budget für 
Materialbestellungen und kennt sich gut mit Webshops aus.

End user
^^^^^^^^
Hugo ist Architekt und im besten Alter. Er erstellt Skizzen und technische
Zeichnungen, aber auch künstlerisch anspruchsvollere Werke. Früher kaufte er
alle Hilfsmittel bei einer Papeterie. Durch CAD ist er mit dem Web in Kontakt
gekommen und nutzt seit kurzen die Vorteile von online-Bestellungen.

Use cases
---------
The shop will be stripped-down to two use cases. With those use cases are 
all major use cases with only little modifications covered. The use cases for 
the shop adimistration will be considered out of scope. 

Major customer
^^^^^^^^^^^^^^
- Ordering of a large amount of one single products or several products
- Volume discount
- Splitting of oders (ev. delivery to different locations)

End user
^^^^^^^^
- Ordering of single products
- Small quantities

Design principles
-----------------
Die nachfolgend aufgelisteten Punkte bilden die Grundlage für die spätere
Implementierung des Design, resp. Layout.

- Produkte stehen im Mittelpunkt 
- Reduziert auf das Wesentliche (Typographie, Farben, etc.)
- Sinnvoller Einsatz von Whitespaces

Statt das Rad neuzuerfinden, Implementation eines ausgereiften Front-end-
Framework (`bootstrap`_) für das Layout, speziell in Bezug auf responsive
Design.

.. _bootstrap: http://getbootstrap.com/
