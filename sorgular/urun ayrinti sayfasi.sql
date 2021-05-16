/* ürünün kendi özel sayfası */
select u.resim, u.uisim, u.umarka, s.indirim, s.fiyat, m.magazaisim
from satis as s, magaza as m, urun as u
where s.mid=m.magazaid and s.uid=u.uid