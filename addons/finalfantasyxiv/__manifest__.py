# -*- coding: utf-8 -*-
{
    'name': "Final Fantaxy XIV",

    'summary': """
        Outil de gestion de Final Fantaxy XIV""",

    'description': """
        Outil de gestion de Final Fantaxy XIV
    """,

    'author': "Rafael Ducasse",
    'website': "tuto-drupal.fr",

    # for the full list
    'category': 'Inventory/games',
    'version': '18.0',

    # any module necessary for this one to work correctly
    'depends': ['base'],

    'application': True,
    'license': "AGPL-3",
    # always loaded
    'data': [
        'security/finalfantasyxiv_security.xml',
        'security/ir.model.access.csv',
        'views/views.xml',
        'views/templates.xml',
        'views/ville_views.xml',
        'views/joueur_views.xml',
        'views/finalfantasyxiv_menu.xml',
    ],
    # only loaded in demonstration mode
    'demo': [
        'demo/demo.xml',
    ],
}