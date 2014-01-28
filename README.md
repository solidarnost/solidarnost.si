Priprava git-a

Pojasnimo gitu kdo smo (to naredimo le prvic, po instalaciji gita):

git config --global user.email "you@example.com"
git config --global user.name "Your Name"


Pred prvo uporabo repozitorija solidarnost.si z githuba potegnemo klon:

git clone --recursive  https://github.com/solidarnost/solidarnost.si.git

V kolikor zelimo se celotno razlicico wordpressa, se premaknemo v direktorij solidarnost.si in tam vpisemo:

git submodule init
git submodule update

(prenese se precej velik repozitorij wordpressa)


Programiramo.....

Vsako spremembo commitamo:
git commit -am "Bla bla bla"

in posljemo na server:
git push

(prvic ne bo delovalo: zazenemo 
git remote add origin https://github.com/solidarnost/solidarnost.si.git 
in nato git push)


V kolikor je ze na serverju priso do sprememb, moramo te spremembe zdruziti s svojimi in potisniti na server.

git pull
git push

