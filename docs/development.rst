.. 

Development
===========

Dieser Abschnitt beschreibt die Konfiguration der Entwicklungs- und Laufzeit-
Umgebung für den Webshop.



Dokumentation
-------------
Für die Dokumentation wird `reStructuredText`_ als Markup-Sprache benutzt. Zum
lokalen Bauen der Dokumentation wird `Sphinx`_ benötigt. `Sphinx`_ ist in der 
`Fedora Package Collection`_ verfügbar und kann unter Fedora mit ``yum`` oder
anderen Paket-Verwaltungswerkzeugen installiert werden::

    # yum -y install python-sphinx python-docutils

Die einzelnen Dateien der Dokumentation befinden sich in ``docs``::

    $ cd docs
    $ make html

Das erzeugte Resultat wird unter ``docs/_build/html`` gespeichert.

Bei jedem Push nach `Github`_ wird ein Rebuild der Dokumentation ausgeführt.
Die neuste Version wird danach automatisch bei `Read the Docs`_ veröffentlicht.

https://shop.rtfd.org/

.. _Sphinx: http://sphinx-doc.org/
.. _reStructuredText: http://docutils.sf.net/rst.html
.. _Fedora Package Collection: https://admin.fedoraproject.org/pkgdb/acls/name/python-sphinx
.. _Read the Docs: https://readthedocs.org/
