

var ALPHABET_MAP = new Map(
[
	// Alpa
	['a', '𐎀'],
	['\'a', '𐎀'],
	// Beta
	['b', '𐎁'],
	// Gamla
	['g', '𐎂'],
	// Kha
	['kh', '𐎃'],
	// Delta
	['d', '𐎄'],
	// Ho
	['h', '𐎅'],
	// Wo
	['v', '𐎆'],
	['w', '𐎆'],
	// Zeta
	['z', '𐎇'],
	// Hota
	['hh', '𐎈'],
	['ḥ', '𐎈'],
	// Tet 
	/* The sound of this letter is quite confusing,
	it is like: tuhh */
	['tr', '𐎉'],
	['ṭ', '𐎉'],
	// Yod
	['y', '𐎊'],
	// Kapa
	['k', '𐎋'],
	['c', '𐎋'],
	['ch', '𐎋'],
	// Shin
	['sh', '𐎌'],
	['x', '𐎌'],
	// Lamda
	['l', '𐎍'],
	// Mem
	['m', '𐎎'],
	// Dhal
	['dh', '𐎏'],
	// Nun
	['n', '𐎐'],
	// Zu
	['tz', '𐎑'],
	// Samka
	['s', '𐎒'],
	// Ain
	['\'', '𐎒'],
	// Pu
	['p', '𐎔'],
	// Tsade
	['ts', '𐎕'],
	// Qopa
	['q', '𐎖'],
	// Rasha
	['r', '𐎗'],
	// Thanna
	['th', '𐎘'],
	// Ghain
	['gh', '𐎙'],
	// To
	['t', '𐎚'],
	// Vowel I
	['i', '𐎛'],
	['e', '𐎛'],
	['ỉ', '𐎛'],
	['\'i', '𐎛'],
	// Vowel U
	['u', '𐎜'],
	['o', '𐎜'],
	['ủ', '𐎜'],
	['\'u', '𐎜'],
	// Ssu
	['ss', '𐎝'],
	['s̀', '𐎝'],
	// Divider
	['_space', '𐎟']
]);

function getAlphabetMap ()
{
	return ALPHABET_MAP;
}

function getAlphabetDigraphs ()
{
	let digraphs = Array.from(ALPHABET_MAP.keys()).filter(function(char, i)
	{
		if(char.length < 2 || char.length > 3)
		{
			return;
		}
		
		return char;
	});
	
	return digraphs;
}

function getKnownVowels ()
{
	return ['a', 'e', 'i', 'o', 'u'];
}

export {
	getAlphabetMap,
	getAlphabetDigraphs,
	getKnownVowels
}



