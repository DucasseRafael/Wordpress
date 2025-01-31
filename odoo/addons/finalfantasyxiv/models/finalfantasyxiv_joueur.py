# -*- coding: utf-8 -*-
from odoo import models, fields, api  # Ensure 'models' is imported
import re
from odoo.exceptions import ValidationError
from datetime import date
from dateutil.relativedelta import relativedelta
from pprint import pprint


class Joueur(models.Model):
    _name = 'finalfantasyxiv.joueur'
    _description = 'Joueur de Final Fantasy XIV'
    
    nom = fields.Char("Nom du Joueur")
    niveau = fields.Integer("Niveau du Joueur")
    dateCreationJoueur = fields.Date(string="Date de Création du joueur")
    image = fields.Binary("Image du joueur")
    classeJoueur = fields.Selection([
        ('paladin', 'Paladin'),
        ('cuisinier', 'Cuisinier'),
        ('barde', 'Barde'),
        ('forestier', 'Forestier')
    ], string="Classe du Joueur", default='paladin')
    
    ville_id = fields.Many2one("finalfantasyxiv.ville", string="Ville")