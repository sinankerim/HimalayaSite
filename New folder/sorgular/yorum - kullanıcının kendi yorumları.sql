select k.isim, uy.puan, uy.yorum
from urunyorumlari as uy, kullanici as k
where uy.kullaniciid=k.id and k.id=0