update siparis
set durum=(select id from durum where durum='Hazirlaniyor') /*esittir ve sonrası çıkarılıp yerine normal id geitirilebilir.*/
where siprarisid=3