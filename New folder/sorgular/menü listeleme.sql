select u.uisim, u.resim, sat.fiyat, m.magazaisim
from satis as sat, urun as u, magaza as m, kategori as k
where (sat.uid=u.uid and sat.mid=m.magazaid) and u.kategori_id=(select k_id from kategori where k_ad='<menuadi>')