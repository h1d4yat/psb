async function  getKabupaten(prov_id) {
    const kab = await axios.get(`/api/wilayah/kabupaten/${prov_id}`);
   return kab.data.data;
    
}
async function getKecamatan(kab_id) {
    const kec = await axios.get(`/api/wilayah/kecamatan/${kab_id}`);
    return kec.data.data;
}
async function getDesa(desa_id) {
    const kec = await axios.get(`/api/wilayah/desa/${desa_id}`);
    return kec.data.data;
}

export default { getDesa, getKabupaten, getKecamatan };