// Rebuilds the country and city lists used by the Get Started form from the country-state-city package.
// Run from the project root after `npm install`:  node resources/data/geo/build.cjs
const fs = require('fs');
const path = require('path');

const countries = require('country-state-city/lib/assets/country.json');
const cities = require('country-state-city/lib/assets/city.json');
const out = __dirname;

// Skip administrative areas listed alongside towns (e.g. "Afder Zone", "Alaba Special Wereda").
const notACity = /\b(Zone|Wereda|Woreda)\b|^Administrative /;

// Plain spelling for the list: "Ādīs ‘Alem" becomes "Adis Alem".
const letters = { 'ø': 'o', 'Ø': 'O', 'ł': 'l', 'Ł': 'L', 'đ': 'd', 'Đ': 'D', 'ð': 'd', 'þ': 'th', 'ß': 'ss', 'æ': 'ae', 'Æ': 'AE', 'œ': 'oe', 'Œ': 'OE', 'ı': 'i' };
const plain = name => name
    .normalize('NFD')
    .replace(/[̀-ͯ]/g, '')
    .replace(/[øØłŁđĐðþßæÆœŒı]/g, ch => letters[ch])
    .replace(/[^A-Za-z0-9 .-]/g, '')
    .replace(/\s+/g, ' ')
    .trim();

const byCountry = {};
for (const [raw, code] of cities) {
    const name = plain(raw);
    if (/[A-Za-z]/.test(name) && !notACity.test(name)) (byCountry[code] ??= new Set()).add(name);
}

const list = countries
    .map(c => ({ code: c.isoCode, name: c.name }))
    .sort((a, b) => a.name.localeCompare(b.name));
fs.writeFileSync(path.join(out, 'countries.json'), JSON.stringify(list));

fs.rmSync(path.join(out, 'cities'), { recursive: true, force: true });
fs.mkdirSync(path.join(out, 'cities'));
for (const [code, names] of Object.entries(byCountry)) {
    fs.writeFileSync(path.join(out, 'cities', code + '.json'), JSON.stringify([...names].sort((a, b) => a.localeCompare(b))));
}

console.log(`${list.length} countries, ${Object.keys(byCountry).length} city lists (Ethiopia: ${byCountry.ET?.size ?? 0} cities)`);
