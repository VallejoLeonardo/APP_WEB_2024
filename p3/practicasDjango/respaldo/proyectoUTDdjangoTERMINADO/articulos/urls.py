from django.urls import path
from .views import *

urlpatterns = [
    path('articulos/', lista_art, name='articulos'),
    path('categorias/', lista_cat, name='categorias'),
]
