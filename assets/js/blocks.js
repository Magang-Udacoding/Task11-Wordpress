/**
 * Gutenberg Custom Blocks Editor Script
 * Toko Berkah - UKM Toko Theme
 */
(function (wp) {
  var registerBlockType = wp.blocks.registerBlockType;
  var el = wp.element.createElement;
  var InspectorControls = wp.blockEditor.InspectorControls || wp.editor.InspectorControls;
  var PanelBody = wp.components.PanelBody;
  var TextControl = wp.components.TextControl;
  var RangeControl = wp.components.RangeControl;
  var TextareaControl = wp.components.TextareaControl;

  // 1. Hero Banner Block
  registerBlockType('ukm-toko/hero-banner', {
    title: 'UKM Hero Banner',
    icon: 'cover-image',
    category: 'ukm-toko-blocks',
    attributes: {
      title: { type: 'string', default: 'Sembako Segar & Murah Langsung dari Gudang' },
      subtitle: { type: 'string', default: 'Beras pulen, minyak goreng, dan sembako lengkap siap antar same-day.' },
      ctaText: { type: 'string', default: 'Belanja Katalog Sekarang' },
      ctaUrl: { type: 'string', default: '/produk/' },
      bgImage: { type: 'string', default: '' },
    },
    edit: function (props) {
      var attr = props.attributes;
      function update(key) {
        return function (val) {
          var obj = {};
          obj[key] = val;
          props.setAttributes(obj);
        };
      }

      return [
        el(InspectorControls, { key: 'controls' },
          el(PanelBody, { title: 'Pengaturan Hero Banner', initialOpen: true },
            el(TextControl, { label: 'Judul Banner', value: attr.title, onChange: update('title') }),
            el(TextareaControl, { label: 'Subjudul', value: attr.subtitle, onChange: update('subtitle') }),
            el(TextControl, { label: 'Teks Tombol CTA', value: attr.ctaText, onChange: update('ctaText') }),
            el(TextControl, { label: 'Link Tombol CTA', value: attr.ctaUrl, onChange: update('ctaUrl') }),
            el(TextControl, { label: 'URL Gambar Latar Belakang (Opsional)', value: attr.bgImage, onChange: update('bgImage') })
          )
        ),
        el('div', {
          key: 'preview',
          style: {
            background: 'linear-gradient(135deg, #09090b 0%, #1e293b 100%)',
            color: '#fff',
            padding: '40px 24px',
            borderRadius: '12px',
            textAlign: 'center'
          }
        },
          el('span', {
            style: {
              display: 'inline-block',
              background: 'rgba(255,255,255,0.15)',
              padding: '4px 12px',
              borderRadius: '999px',
              fontSize: '11px',
              fontWeight: '700',
              textTransform: 'uppercase',
              marginBottom: '12px'
            }
          }, 'Hero Banner Toko Berkah'),
          el('h2', { style: { fontSize: '24px', fontWeight: '800', margin: '0 0 10px 0' } }, attr.title),
          el('p', { style: { color: '#cbd5e1', fontSize: '14px', margin: '0 0 18px 0' } }, attr.subtitle),
          el('span', {
            style: {
              display: 'inline-block',
              background: '#fff',
              color: '#09090b',
              padding: '10px 20px',
              borderRadius: '6px',
              fontWeight: '700',
              fontSize: '14px'
            }
          }, attr.ctaText + ' →')
        )
      ];
    },
    save: function () {
      return null; // Rendered via PHP render_callback
    }
  });

  // 2. Product Grid Block
  registerBlockType('ukm-toko/product-grid', {
    title: 'UKM Product Grid',
    icon: 'grid-view',
    category: 'ukm-toko-blocks',
    attributes: {
      sectionTitle: { type: 'string', default: 'Produk Sembako Pilihan' },
      numberOfColumns: { type: 'number', default: 4 },
      productsPerPage: { type: 'number', default: 8 },
      selectedCategory: { type: 'string', default: '' },
    },
    edit: function (props) {
      var attr = props.attributes;
      function update(key) {
        return function (val) {
          var obj = {};
          obj[key] = val;
          props.setAttributes(obj);
        };
      }

      return [
        el(InspectorControls, { key: 'controls' },
          el(PanelBody, { title: 'Pengaturan Product Grid', initialOpen: true },
            el(TextControl, { label: 'Judul Section', value: attr.sectionTitle, onChange: update('sectionTitle') }),
            el(RangeControl, { label: 'Jumlah Produk Ditampilkan', value: attr.productsPerPage, min: 2, max: 24, onChange: update('productsPerPage') }),
            el(RangeControl, { label: 'Jumlah Kolom', value: attr.numberOfColumns, min: 2, max: 4, onChange: update('numberOfColumns') }),
            el(TextControl, { label: 'Filter Slug Kategori (sembako, minuman, dll)', value: attr.selectedCategory, onChange: update('selectedCategory') })
          )
        ),
        el('div', {
          key: 'preview',
          style: {
            background: '#f8fafc',
            border: '1px solid #e2e8f0',
            borderRadius: '12px',
            padding: '24px'
          }
        },
          el('div', { style: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '16px' } },
            el('h3', { style: { margin: 0, fontSize: '18px', fontWeight: '700' } }, attr.sectionTitle),
            el('span', { style: { fontSize: '12px', color: '#64748b' } }, attr.productsPerPage + ' Produk (' + attr.numberOfColumns + ' Kolom)')
          ),
          el('div', {
            style: {
              display: 'grid',
              gridTemplateColumns: 'repeat(' + attr.numberOfColumns + ', 1fr)',
              gap: '12px'
            }
          },
            [1, 2, 3, 4].slice(0, attr.numberOfColumns).map(function (n) {
              return el('div', {
                key: n,
                style: {
                  background: '#fff',
                  border: '1px solid #cbd5e1',
                  borderRadius: '8px',
                  padding: '16px',
                  textAlign: 'center'
                }
              },
                el('div', { style: { background: '#f1f5f9', height: '90px', borderRadius: '6px', marginBottom: '8px', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '24px' } }, '📦'),
                el('strong', { style: { fontSize: '13px', display: 'block' } }, 'Contoh Produk #' + n),
                el('span', { style: { color: '#059669', fontSize: '12px', fontWeight: '700' } }, 'Rp 25.000')
              );
            })
          )
        )
      ];
    },
    save: function () {
      return null;
    }
  });

  // 3. Testimonial Slider Block
  registerBlockType('ukm-toko/testimonial-slider', {
    title: 'UKM Testimonial Slider',
    icon: 'format-quote',
    category: 'ukm-toko-blocks',
    attributes: {
      customerName: { type: 'string', default: 'Ibu RT Ratna (Toko Bu RT)' },
      customerPhoto: { type: 'string', default: '' },
      testimonial: { type: 'string', default: 'Alhamdulillah pasokan sembako untuk warung selalu tepat waktu, berasnya wangi pulen dan timbangan sangat pas!' },
      rating: { type: 'number', default: 5 },
    },
    edit: function (props) {
      var attr = props.attributes;
      function update(key) {
        return function (val) {
          var obj = {};
          obj[key] = val;
          props.setAttributes(obj);
        };
      }

      return [
        el(InspectorControls, { key: 'controls' },
          el(PanelBody, { title: 'Pengaturan Testimonial', initialOpen: true },
            el(TextControl, { label: 'Nama Pelanggan / Mitra', value: attr.customerName, onChange: update('customerName') }),
            el(TextareaControl, { label: 'Isi Testimoni', value: attr.testimonial, onChange: update('testimonial') }),
            el(RangeControl, { label: 'Rating Bintang (1-5)', value: attr.rating, min: 1, max: 5, onChange: update('rating') })
          )
        ),
        el('div', {
          key: 'preview',
          style: {
            background: '#fff',
            border: '1px solid #e2e8f0',
            borderRadius: '12px',
            padding: '24px',
            boxShadow: '0 2px 4px rgba(0,0,0,0.04)'
          }
        },
          el('div', { style: { color: '#f59e0b', fontSize: '18px', marginBottom: '8px' } }, '★'.repeat(attr.rating)),
          el('p', { style: { fontStyle: 'italic', color: '#334155', fontSize: '14px', lineHeight: '1.6', margin: '0 0 14px 0' } }, '“' + attr.testimonial + '”'),
          el('strong', { style: { color: '#0f172a', fontSize: '13px' } }, attr.customerName)
        )
      ];
    },
    save: function () {
      return null;
    }
  });

})(window.wp);
