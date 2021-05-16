select * 
from urun as u 
where u.uisim like '%bilgisayar%' or u.hakkinda like '%bilgisayar%'

select u.uisim, u.resim, sat.fiyat, m.magazaisim
from satis as sat, urun as u, magaza as m 
where (sat.uid=u.uid and sat.mid=m.magazaid) and
((u.uisim like '%bilgisayar%' or u.hakkinda like '%bilgisayar%' or m.magazaisim like '%bilgisayar%') and (sat.fiyat<40))