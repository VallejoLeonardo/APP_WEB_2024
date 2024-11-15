from django.shortcuts import render

# Create your views here.

def index(request):
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content':'>>Bienvenidos a la Pagina de Principal<<',
    })
    
def about(request):  
    return render(request, 'mainapp/about.html', {
        'title': 'Acerca de nosotros', 
        'content': 'Soy un estudiante de desarrollo de software',   
    })  
def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title': 'Mision', 
        'content': 'mision de la empresa',   
    })
    
def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title': 'Vision', 
        'content': 'vision de la empresa',   
    })

