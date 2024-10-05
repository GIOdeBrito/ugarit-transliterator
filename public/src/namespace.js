
/* Namespaces */

class __NS
{
	static __namespaceCollection = [];
}

class Namespace
{
	constructor ()
	{
		let name = this.constructor.name;

		// Invoke 'self' constructor function
		this.invoke(name);
	}

	static staticConstructor ()
	{
		let has = __NS.__namespaceCollection.find(item => item === this.name);

		if(has)
		{
			return;
		}

		__NS.__namespaceCollection.push(this.name);

		// This namespace's name
		let name = this.name;

		if(!this?.[name])
		{
			return;
		}

		// Invoke self static constructor
		this.invoke(this.name);
	}

	/* INSTANCE FUNCTIONS */

	invoke (funcname, ...params)
	{
		if(this.hasOwnProperty(funcname)) return this?.[funcname](...params) ?? null;
	}

	invokeGet (funcname)
	{
		if(this.hasOwnProperty(funcname)) return this?.[funcname] ?? null;
	}

	invokeSet (funcname, value)
	{
		this.hasOwnProperty(funcname) && (this[funcname] = value);
	}

	/* STATIC FUNCTIONS */

	static invoke (funcname, ...params)
	{
		// Calls static constructor of class
		this.staticConstructor();
		if(this.hasOwnProperty(funcname)) return this?.[funcname](...params);
	}

	static invokeGet (funcname)
	{
		this.staticConstructor();
		if(this.hasOwnProperty(funcname)) return this?.[funcname] ?? null;
	}

	static invokeSet (funcname, value)
	{
		this.staticConstructor();
		this.hasOwnProperty(funcname) && (this[funcname] = value);
	}
}

export default Namespace;


