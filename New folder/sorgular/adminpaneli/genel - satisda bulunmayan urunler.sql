select uid,uisim,umarka,kategori_id,hakkinda,resim from urun
EXCEPT
select u.uid,u.uisim,u.umarka,u.kategori_id,u.hakkinda,u.resim from urun as u, satis as s where u.uid=s.uid