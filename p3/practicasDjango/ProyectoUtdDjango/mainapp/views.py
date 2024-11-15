# mainapp/views.py
from django.shortcuts import render, redirect

# Vista de página principal
def index(request):
    mensaje = 'Sea bienvenido a la página de inicio.(:)'
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content': '.::!BIENVENIDO A LA PAGINA PRINCIPAL!::.',
        'mensaje': mensaje
    })

# Otras vistas
def about(request):
    return render(request, 'mainapp/index.html', {
        'title': 'Acerca de nosotros',
        'content': 'Somos un equipo de desarrollo de software'
    })

def mision(request):
    return render(request, 'mainapp/index.html', {
        'title': 'Misión',
        'content': 'En la Universidad Tecnológica de Durango nuestra misión es: Formar seres humanos íntegros, profesionalmente calificados que sean agentes de cambio para el desarrollo económico, tecnológico y cultural que beneficien a la sociedad.'
    })

def vision(request):
    return render(request, 'mainapp/index.html', {
        'title': 'Visión',
        'content': 'Para el año 2030 ser la primera opción de ingreso en educación superior, por tener el 100% de sus carreras acreditadas, cuerpos académicos consolidados, oferta académica de posgrados y el 70% de sus egresados desempeñándose profesionalmente.'
    })

# Vista para manejar el error 404 y redirigir a la página de inicio
def error_404_view(request, exception):
    return redirect('inicio')
