# -*- coding: utf-8 -*-
# from odoo import http


# class Finalfantasyxiv(http.Controller):
#     @http.route('/finalfantasyxiv/finalfantasyxiv', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/finalfantasyxiv/finalfantasyxiv/objects', auth='public')
#     def list(self, **kw):
#         return http.request.render('finalfantasyxiv.listing', {
#             'root': '/finalfantasyxiv/finalfantasyxiv',
#             'objects': http.request.env['finalfantasyxiv.finalfantasyxiv'].search([]),
#         })

#     @http.route('/finalfantasyxiv/finalfantasyxiv/objects/<model("finalfantasyxiv.finalfantasyxiv"):obj>', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('finalfantasyxiv.object', {
#             'object': obj
#         })

