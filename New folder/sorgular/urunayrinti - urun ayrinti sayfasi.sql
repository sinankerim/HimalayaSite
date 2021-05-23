/* ürünün kendi özel sayfası */
select top 1 u.resim, u.uisim, u.umarka, s.indirim, s.fiyat, m.magazaisim
from satis as s, magaza as m, urun as u
where s.mid=m.magazaid and s.uid=u.uid and u.uid=0
order by s.fiyat 