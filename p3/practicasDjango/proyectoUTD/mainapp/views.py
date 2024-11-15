from django.shortcuts import render

# Create your views here.
def index(request):
    mensaje = 'HOLA  SOY UN MENSAJE'
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content':'>>Bienvenidos a la Pagina de Principal<<',
        'mensaje': mensaje
    })
    
def about(request):  
    return render(request, 'mainapp/about.html', {
        'title': 'Acerca de nosotros', 
        'content': 'Somos un equipo de Desarrolladores de Software',   
    })  
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title': 'Mision', 
        'content': 'Nuestra mision es desarrollar software de calidad',   
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title': 'Vision', 
        'content': 'Ser una empresa lider en el desarrollo de software',   
    })

