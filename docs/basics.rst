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
Eva is responsible for the ordering of office supplies in her joinery. She is 
ordering twice a month a large amount of various product for different users
(management, back office, and production). Eva has a fix budget for the orders
and she knows her way around web shops.

End user
^^^^^^^^
Hugo is an architect and middle aged. He is drawing sketches and technical 
drawings but also artistically demanding pieces by hand. Thanks to the work
with CAD he decovers the web and its advantages. Before he bought all his 
tools in a local stationery, nowadays he is ordering stuff online.

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

- Products should be in the spot light 
- Reduced to the essentials (typography, colors, fonts, etc.)
- meaningful use of whitespaces

Instead of reinventing the wheel it should be considered to use a matured
front-end framework like `bootstrap`_ for the layout, especially regarding 
responsive design.

.. _bootstrap: http://getbootstrap.com/
