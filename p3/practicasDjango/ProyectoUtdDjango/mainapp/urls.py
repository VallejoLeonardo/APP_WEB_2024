from django.urls import path
from .views import *


urlpatterns = [
path('',index, name='inicio'),
path('inicio/', index, name='inicio'),
path('acercade/',about, name='acercade'),
path('mision/',mision, name='mision'),
path('vision/',vision, name='vision'),
]

