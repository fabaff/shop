.. 

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
configuration are still defaults.

The web server is running in SSL-only mode and the certificate is generated
during the server setup.

.. _Apache: http://apache.org/
.. _Lighttpd: http://www.lighttpd.net/
.. _FastCGI: http://www.fastcgi.com/drupal/

Database server
---------------
For persistence storage a `MySQL`_ or the drop-in replacement `MariaDB`_
database is used. `phpMyAdmin` is available under `/phpmyadmin/` on the
web server, beside the command-line tools, for easy administration. The
default credentials for `phpMyAdmin` are root/webshop.

.. _MySQL: http://www.mysql.com/
.. _phpMyAdmin: http://www.phpmyadmin.net
.. _MariaDB: https://mariadb.org/

Versions
--------
The web shop is built with the below listed components and tested. Other
releases can be used and may work but this will not be tested. Probably it
will work with different releases. 

- Operating system: Fedora 19
- Kernel: 3.11.8-200.fc19.x86_64
- Lighttpd: 1.4.32
- PHP: 5.5.5
- MySQL: 5.5.33

Configuration management
------------------------
For the creation of reproducable and identical environment for the development
and the run-time across different systems `Ansible`_ is used as configuration
management solution. All needed steps of the installation are automated. The
configuration doesn't differentiate between local or remote installations. This
matters only for the deployment of the web content.

The configuration of Ansible itself (adding the system to ``/etc/ansible/hosts``
and copying the SSH keys) is not documented at this place. There are various
resources available, like `here`_. All playbooks are located in the folder
`devel`::

    $ sudo ansible-playbook devel/setup.yml

The used group name in ``/etc/ansible/hosts`` is: **webshop**

If the setup completes without errors, then the web server is accessible and show
a default page.

For testing the deployment of new instances of the web shop, `short-virt`_ can
help. This simple bash script creates virtual machines without user interaction.
Requirements for this are installed libvirt tools and additional storage space
(approx. 8 GB) for the image.

For local development it's possbile to use an LXC container to save resources.::

    $ sudo ansible-playbook devel/container.yml

To get everything running some additional steps (check the network inside the
container, generate keys, etc.) are needed. After you are done, check it::

    $ sudo ansible webshop -m setup

.. _Ansible: https://github.com/ansible/ansible
.. _here: https://github.com/fabaff/fedora-ansible/blob/master/README.md
.. _shop-virt: https://github.com/fabaff/ch.bfh.bti7054.w2013.p.shop/blob/master/devel/shop-virt

Deployment
----------
For the simple deployment of the lastest version of the shop a playbook called
``deploy.yml`` is provided. This palybook put all files in place. ::

    $ sudo ansible-playbook devel/deploy.yml

Git respository
---------------
All project relevante informations (Source code, templates, documentation, etc)
is located in a public `Git`_ repository on `Github`_.

https://github.com/fabaff/ch.bfh.bti7054.w2013.p.shop 

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

https://shop.rtfd.org/

.. _Sphinx: http://sphinx-doc.org/
.. _reStructuredText: http://docutils.sf.net/rst.html
.. _Fedora Package Collection: https://admin.fedoraproject.org/pkgdb/acls/name/python-sphinx
.. _Read the Docs: https://readthedocs.org/
