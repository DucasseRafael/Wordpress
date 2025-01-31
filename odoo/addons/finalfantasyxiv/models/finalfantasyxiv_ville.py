# -*- coding: utf-8 -*-
from odoo import models, fields, api  # Ensure 'models' is imported
import re
from odoo.exceptions import ValidationError
from datetime import date
from dateutil.relativedelta import relativedelta
from pprint import pprint

class Ville(models.Model):
    _name = 'finalfantasyxiv.ville'
    _description = 'Description de la ville'
    _rec_name = "nomVille"  

    nomVille = fields.Char("Ville")
    nbreMarchands = fields.Integer("Nombre de Marchands", default=0)
    DateCreationVille = fields.Date(string="Date de Création de la Ville")
    image = fields.Binary("Image de la Ville")

    zoneVille = fields.Selection([
        ('mer', 'Mer'),
        ('desert', 'Desert'),
        ('neige', 'Neige'),
        ('foret', 'Foret')
    ], string="Zone de la ville", default='mer')

    joueur_ids = fields.One2many(
        "finalfantasyxiv.joueur",
        "ville_id",  
        string="Joueurs ayant débutés dans cette ville"
    )