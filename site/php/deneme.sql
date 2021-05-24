select u.uid, u.uisim,u.resim, u.umarka, u.hakkinda, s.fiyat, m.magazaisim 
from urun as u, satis as s, magaza as m
where u.uid=4 order by s.fiyat asc limit 1

select u.uid, u.uisim, u.marka, u.hakkinda, s.fiyat, m.magazaidim 
from urun
inner join satis as s


select u.uid, u.uisim, u.resim, s.fiyat from urun as u, satis as s where u.uid=s.uid