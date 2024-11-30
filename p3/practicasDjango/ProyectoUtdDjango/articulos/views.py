from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Category, Article

# Create your views here.
@login_required(login_url='index')
def lista_art(request):
    
    articles=Article.objects.all()
    
    return render(request, 'articulos/listado_art.html', {
        'title': 'Artículos',
        'content': 'Listado de artículos',
        'articles': articles
    })

@login_required(login_url='index')
def lista_cat(request):
    categories=Category.objects.all()
    return render(request, 'categorias/listado_cat.html', {
        'title': 'Categorías',
        'content': 'Listado de categorías',
        'categories': categories
    })