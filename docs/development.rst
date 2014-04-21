.. _development:

Development
===========
This sections describes the configuration of the development and runtime 
environment for the web shop.

Web server
----------
Instead of `Apache`_ the project is running on `Lighttpd`_. The reasons are
that Lighttpd provides faster setup, easier configuration, and better 
performance. Lighttpd is running with `FastCGI`_.

The path of the web server is ``/var/www/lighttpd/`` and the SELinux
configuration are still the defaults.

The web server is running in SSL-only mode and the certificate is generated
during the server setup process.

.. _Apache: http://apache.org/
.. _Lighttpd: http://www.lighttpd.net/
.. _FastCGI: http://www.fastcgi.com/drupal/

Database server
---------------
For persistence storage the drop-in replacement `MariaDB`_ is used. `MySQL`_ 
will work to but this is not tested. `phpMyAdmin` is available under ``/phpmyadmin/``
on the web server, beside the command-line tools, for easy administration.

The default credentials for ``phpMyAdmin`` are root/rav or the entry you made
in the Ansible playbook ``devel/variables/sensitive.yml``

.. _MySQL: http://www.mysql.com/
.. _phpMyAdmin: http://www.phpmyadmin.net
.. _MariaDB: https://mariadb.org/

Versions
--------
The web shop is built with the below listed components and tested. Other
releases can be used and may work but this will not be tested. Probably it
will work with different releases. 

- Operating system: Fedora 20
- Kernel: 3.13.5-202.fc20.x86_64
- Lighttpd: 1.4.34
- PHP: 5.5.7
- MariaDB: 5.5.34

For communication ``postfix`` and ``mosquitto`` are needed additionally.

Setup infrastructure
--------------------

Configuration management
''''''''''''''''''''''''
For the creation of reproducable and identical environment for the development
and the run-time across different systems `Ansible`_ is used as configuration
management solution. All needed steps of the installation are automated. The
configuration doesn't differentiate between local or remote installations. This
matters only for the deployment of the web content.

For local development it's possible to use an LX container. ::

    $ sudo ansible-playbook devel/container.yml

To get everything running some additional steps (check the network inside the
container, generate keys, etc.) are needed. After you are done, check it::

    $ sudo ansible rav -m setup

From the management system::

    $ sudo ssh-copy-id -i /root/.ssh/id_rsa.pub root@[IP address of your managed node]

The configuration of Ansible itself (adding the system to ``/etc/ansible/hosts``
and copying the SSH keys) is not documented at this place. There are various
resources available, like `here`_. All playbooks are located in the folder
`devel`. Start the setup with the command shown below::

    $ sudo ansible-playbook devel/setup.yml

The used group name in ``/etc/ansible/hosts`` is: **rav**

If the setup completes without errors, then the web server is accessible and
show a default page. Please keep in mind, that the server is only accessible 
over https://, unencrypted traffic is not allowed.

.. _Ansible: https://github.com/ansible/ansible
.. _here: https://github.com/fabaff/fedora-ansible/blob/master/README.md

Deployment/Setup website
''''''''''''''''''''''''
For the simple deployment of the lastest version of the shop a playbook called
``deploy.yml`` is provided. This playbook put all files in place. ::

    $ sudo ansible-playbook devel/deploy.yml

To full deploy the webshop all tables in the database must exist. The file
``rav-calc.sql`` contains all needed SQL commands and sample data for the
web application.

It's possible to deploy the website manually but this is not recommended. A
couple of files are depending on templates which are created during the 
deployment. 

It's also not recommanded to clone everything into your webserver root. This 
would save you the trouble of doing it by hand but third-party features are
missing then. Those missing parts are the template engine, the pdf generation, 
the connection to Openstreetmap, and probably other things not mentioned here.

Git respository
---------------
All project relevante informations (Source code, templates, documentation, etc.)
is located in a public `Git`_ repository on `Github`_.

https://github.com/fabaff/rav-calc 

.. _Github: https://github.com
.. _Git: http://git-scm.com/

Documentation
-------------
The documentation is using `reStructuredText`_ as markup language. For a 
local build `Sphinx`_ is needed. `Sphinx`_ is available in the 
`Fedora Package Collection`_ and can be installed with ``yum`` or any other
package management tool::

    # yum -y install python-sphinx python-docutils

The source files of the documentation are located under ``docs``::

    $ cd docs
    $ make html

The output is stored under ``docs/_build/html``.

After every push to `Github`_ a hook launch a rebuild of the documentation.
The latest release will be published on `Read the Docs`_ automatically.

https://rav-calc.rtfd.org/

.. _Sphinx: http://sphinx-doc.org/
.. _reStructuredText: http://docutils.sf.net/rst.html
.. _Fedora Package Collection: https://admin.fedoraproject.org/pkgdb/acls/name/python-sphinx
.. _Read the Docs: https://readthedocs.org/
