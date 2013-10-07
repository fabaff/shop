.. 

Development
===========
This sections describes the configuration of the development and runtime 
environment for the web shop.

Web server
----------
Instead of `Apache`_ the project is running on `Lighttpd`_. The reasons are
that Lighttpd provides fast setup, easy configuration, and better performance.
Lighttpd is running with `FastCGI`_.

The path of the web server is ``/var/www/lighttpd/`` and the SELinux
configuration are still defaults.

.. _Apache: http://apache.org/
.. _Lighttpd: http://www.lighttpd.net/
.. _FastCGI: http://www.fastcgi.com/drupal/

Database server
---------------
For persistence storage a `MySQL`_ data base is used. `phpMyAdmin` is available
under `/phpmyadmin/` on the web server, beside the command-line tools, for easy
administration.

.. _MySQL: http://www.mysql.com/
.. _phpMyAdmin: http://www.phpmyadmin.net

Versions
--------
The web shop is built with the following listed components and tested. Other
releases can be used and may work but this will not be tested. Probably it
will work with different releases. 

- Operating system: Fedora 19
- Kernel: 3.11.1-200.fc19.x86_64
- Lighttpd: 1.4.32
- PHP: 5.5.4
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

    $ sudo ansible-playbook setup.yml

The used group name in ``/etc/ansible/hosts`` is: **webshop**

For testing the deployment of new instances of the web shop, `short-virt`_ can
help. This simple bash script creates virtual machines without user interaction.
Requirements for this are installed libvirt tools and additional storage space
(ca. 8 GB) for the image.

.. _Ansible: https://github.com/ansible/ansible
.. _here: https://github.com/fabaff/fedora-ansible/blob/master/README.md
.. _shop-virt: https://github.com/fabaff/ch.bfh.bti7054.w2013.p.shop/blob/master/devel/shop-virt

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
