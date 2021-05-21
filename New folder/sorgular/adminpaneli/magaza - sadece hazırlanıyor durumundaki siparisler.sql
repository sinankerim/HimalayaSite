/*Magaza için Siparislerim */ 
USE eticsitedb

select s.siprarisid, s.adet, u.uisim,u.uid,k.isim,k.eposta,s.tarih,s.durum
from siparis as s, magaza as m, satis as sat, kullanici as k,urun as u
where (s.sid=sat.satisid and m.magazaid=sat.mid and s.kid=k.id and sat.uid=u.uid) and (m.magazaid=1 and s.durum='hazirlaniyor')
order by durum