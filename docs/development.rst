.. 

Development
===========
Dieser Abschnitt beschreibt die Konfiguration der Entwicklungs- und Laufzeit-
Umgebung für den Webshop.

Web-Server
----------
Als Web-Server wird, anders als vorgeschlagen nicht `Apache`_, sondern
`Lighttpd`_ benutzt. Die Gründe sind, dass Lighttpd einfachere Konfiguration
und bessere Performance bietet. Lighttpd wird mit `FastCGI`_ betrieben.

Der Web-Server-Pfad ist ``/var/www/lighttpd/`` und die SELinux-Konfiguration
in den Standard-Einstellungen belassen.

.. _Apache: http://apache.org/
.. _Lighttpd: http://www.lighttpd.net/
.. _FastCGI: http://www.fastcgi.com/drupal/

Datenbank-Server
----------------
Im Hintergrund arbeitet eine `MySQL`_-Datenbank. Für eine vereinfachte
Administration steht, neben den Kommandozeilen-Werkzeugen auch `phpMyAdmin`
unter `/phpmyadmin/` auf dem Web-Server zur Verfügung. 

.. _MySQL: http://www.mysql.com/
.. _phpMyAdmin: http://www.phpmyadmin.net

Versionen
---------
Der Webshop wird mit den nachfolgend aufgeführten Koponenten entwickelt und
getestet. Andere Versionen werden nicht getestet, jedoch wird es wahrscheinlich
möglich sein, diese zu verwenden, wenn auch mit Einschränkungen.

- Betriebssystem: Fedora 19
- Kernel: 3.11.1-200.fc19.x86_64
- Lighttpd: 1.4.32
- PHP: 5.5.4
- MySQL: 5.5.33

Konfigurationsmanagement
------------------------
Um reproduzierbare Umgebungen für die Entwicklung und Laufzeit zu haben, wird
`Ansible`_ als Konfigurationsmanagement-Lösung eingesetzt. Alle Schritte der
Installation sind automatisiert. Die Konfiguration unterscheidet nicht zwischen
einer lokalen Installation und einer remote Installation. Dies hat jedoch beim
Deployment der Seite eine Bedeutung.

Auf die Konfiguration von Ansible selber (Hinzufügen des Systems zu
``/etc/ansible/hosts`` und Kopieren des SSH-Schlüssel) wird an dieser Stelle
nicht eingegangen (dies kann `hier`_ nachgelesen werden). Alle Playbooks
befinden sich im Verzeichnis `devel`::

    $ sudo ansible-playbook setup.yml

Der verwendete Gruppen-Name ist: **webshop**

.. _Ansible: https://github.com/ansible/ansible
.. _hier: https://github.com/fabaff/fedora-ansible/blob/master/README.md

Git-Respository
---------------
Alle projektrelevanten Unterlagen (Source code, Templates, Dokumentation, etc)
befindet sich in einem öffentlichen `Git`_-Repository bei `Github`_.

https://github.com/fabaff/ch.bfh.bti7054.w2013.p.shop 

.. _Github: https://github.com
.. _Git: http://git-scm.com/

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
