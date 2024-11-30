from django.shortcuts import render,redirect
# from django.contrib.auth.forms import UserCreationForm
from mainapp.forms import RegisterForm
from django.contrib import messages
from django.contrib.auth import login, logout, authenticate
from django.contrib.auth.decorators import login_required
from django.contrib.auth.forms import UserChangeForm

# Create your views here.
def index(request):
    mensaje="Hola Mundo"
    return render(request, 'mainapp/index.html', { 'title': 'Inicio',
    'content': 'Bienvenido a la página de inicio',
    'mensaje':mensaje })

@login_required(login_url='index')
def about(request):
    return render(request, 'mainapp/about.html', { 'title': 'Acerca de',
    'content': 'Somos un equipo de desarrollo de software' })

@login_required(login_url='index')
def mision(request):
    return render(request, 'mainapp/mision.html', { 'title': 'Mision',
    'content': 'Formar seres humanos íntegros, profesionalmente calificados que sean agentes de cambio para el desarrollo económico, tecnológico y cultural que beneficien a la sociedad.' })

@login_required(login_url='index')
def vision(request):
    return render(request, 'mainapp/vision.html', { 'title': 'Vision',
    'content': 'Para el año 2030 ser la primera opción de ingreso en educación superior, por tener el 100% de sus carreras acreditadas, cuerpos académicos consolidados, oferta académica de posgrados y el 70% de sus egresados desempeñándose profesionalmente.' })

def registro(request):

    if request.user.is_authenticated:
        return redirect('index')
    else:
        registro_form = RegisterForm()

        if request.method == "POST":
            registro_form = RegisterForm(request.POST)

            if registro_form.is_valid():
                registro_form.save()
                messages.success(request,'Registro éxitoso')
                return redirect('index')

        return render(request, 'users/registro.html',{
            'title': 'Registro',
            'form':registro_form,
        })

def login_user(request):
    if request.user.is_authenticated:
        return redirect('index')
    else:
        if request.method == 'POST':
            username = request.POST.get('username')
            password = request.POST.get('password')

            user=authenticate(request, username=username, password=password)
            if user is not None:
                login(request, user)
                messages.success(request,"Bienvenido al inicio de sesion")
                return redirect ('index')
            else:
                messages.warning(request, "No es posible el acceso ")
        return render(request, 'users/login.html',{
            'title':'Inicio de sesion',
    })

def logout_user(request):
    logout(request)
    messages.info(request,"Sesion cerrada")
    return redirect('index')

def error_404_view(request,exception):
    return redirect('index')