from django.urls import path, include
from .views import *

urlpatterns = [
    path('', index, name='index'),
    path('inicio/', index, name='index'),
    path('acerca/', about, name='about'),
    path('mision/', mision, name='mision'),
    path('vision/', vision, name='vision'),
    path('login/', login_user, name='login'),
    path('registro/', registro, name='registro'),
    path('logout/', logout_user, name='logout'),
    path('art/', include('articulos.urls')),
]